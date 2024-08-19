<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Point;
use Illuminate\Http\Request;
use App\Models\RinciOrder;
use App\Models\Penjualan;
use Illuminate\Support\Carbon;
use App\Models\Kasir;

use Illuminate\Support\Facades\DB;

class RinciOrderController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $status4 = 4;

    $data = RinciOrder::where('noFaktur', $request->noFaktur)->get();
    $data2 = Order::where(['noFaktur' => $request->noFaktur, 'status' => !$status4])->get();
    $data3 = Order::where(['noFaktur' => $request->noFaktur])->get();
    // dd($data2);
    $subtotal = $data->sum('subtotal');

    $poin1 = Point::sum('kelipatan');

    $poin = doubleval($subtotal) / $poin1;

    if ($request->status == 4) {
      if (Order::where(['noFaktur' => $request->noFaktur, 'status' => 0])->count() <= 1) {
        Order::where('id', $request->id)
          ->update(['status' => $request->status, 'alasanPembatalan' => $request->alasanPembatalan]);

        $order = Order::where(['noFaktur' => $request->noFaktur, 'status' => 0])->get();
        // dd($order);

        RinciOrder::where(['noFaktur' => $request->noFaktur])
          ->update(['status' => 4]);

        return redirect()->to('/orders')->with('success', 'Barang dibatalkan oleh penjual');
      } else {
        Order::where('id', $request->id)
          ->update(['status' => $request->status, 'alasanPembatalan' => $request->alasanPembatalan]);
        $order = Order::where(['noFaktur' => $request->noFaktur, 'status' => 0])->get();
        // dd($order);

        RinciOrder::where(['noFaktur' => $request->noFaktur, 'status' => 0])
          ->update(['subtotal' => $order->sum('subtotal')]);

        // return redirect()->to('/orders')->with('success', 'Barang dibatalkan oleh penjual');
        return back()->with('success', 'Barang dibatalkan oleh Smega Mart');
      }
    } elseif ($request->status == 1) {
      RinciOrder::where('id', $id)
        ->update(['status' => $request->status]);
      Order::where('noFaktur', $request->noFaktur)
        ->update(['status' => $request->status]);

      return redirect()->to('/orders')->with('success', 'Barang segera dikemas');
    } elseif ($request->status == 2) {
      RinciOrder::where('id', $id)
        ->update(['status' => $request->status]);

      Order::where('noFaktur', $request->noFaktur)
        ->update(['status' => $request->status]);

      return redirect()->to('/orders/dikemas')->with('success', 'Barang segera dikirim');
      // return back()->with('success', 'Barang segera dikirim');
    } elseif ($request->status == 3) {
      // dd($request->all());
      RinciOrder::where(['noFaktur' => $request->noFaktur, 'status' => 0])
        ->update(['status' => $request->status]);

      RinciOrder::where(['noFaktur' => $request->noFaktur, 'status' => 0])
        ->update(['statusBayar' => 1]);

      Order::where(['noFaktur' => $request->noFaktur, 'status' => 0])
        ->update(['status' => $request->status]);

      Order::where(['noFaktur' => $request->noFaktur, 'status' => 0])
        ->update(['statusBayar' => 1]);

      $dataSet = [];
      foreach ($data3 as $d) {
        $dataSet[] = [
          'noFakturJualan' =>  $d->noFaktur,
          'barcode' =>  $d->barcode,
          'namaBarang' =>  $d->namaBarang,
          'jmlhJual' =>  $d->qty,
          'hrgJual' =>  $d->hrgJual,
          'hrgBeli' =>  $request->hrgBeli,
        ];
      }
      // dd($dataSet);
      // Kasir::create($dataSet);
      DB::table('tabelrealpenjualan')->insert($dataSet);

      Penjualan::create([
        'No_Faktur_Jual' => $request->noFaktur,
        'Tgl_Jual' => date('Y-m-d', strtotime(Carbon::now())),
        'Kd_Pelanggan' => '',
        'Total' => $subtotal,
        'Bayar' => $subtotal,
        'Kd_User' => auth()->user()->kdUser,
        'poin' => $poin,
      ]);

      // return redirect()->to('/orders')->with('success', 'Barang sudah disetujui');
      return back()->with('success', 'Barang telah disetujui');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }
}
