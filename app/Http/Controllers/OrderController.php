<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Penjualan;
use App\Models\RinciOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function index()
  {
    $brg = Order::where(['status' => 1])->get();
    return view('kasir.pages.order.index', [
      'title' => 'Pesanan',
      'brg' => $brg,
    ]);
  }

  public function store(Request $request)
  {
    // dd($request->alamat);
    $no = $request->no;
    $alamat = [
      'alamat' => $request->alamat
    ];

    // dd($alamat);
    for ($i = 0; $i < count($no); $i++) {
      $data = [
        'noFaktur' => $request->noFaktur[$i],
        'barcode' => $request->barcode[$i],
        'namaBarang' => $request->namaBarang[$i],
        'hrgJual' => $request->hrgJual[$i],
        'subtotal' => $request->subtotal[$i],
        'qty' => $request->qty[$i],
        'status' => $request->status[$i],
        'statusBayar' => $request->statusBayar[$i],
        'kdUser' => $request->kdUser[$i],
        'tgl_Jual' => $request->tgl_Jual[$i],
      ];
      // dd($data);
      $order = Order::create($data);
      // dd($order);
    }
    $a = Order::where('noFaktur', $order['noFaktur'])->get();
    // dd($order2);
    $rinci = RinciOrder::create([
      'noFaktur' => $order->noFaktur,
      'qty' => $a->sum('qty'),
      'subtotal' => $a->sum('subtotal'),
      'kdUser' => $order->kdUser ?? '',
      'status' => 0,
      'statusBayar' => 0,
    ]);
    // dd($rinci);

    $rinci->update($alamat);

    Keranjang::where('kdUser', $request->kdUser)
      ->delete();

    // return response()->json('succes', 200);
    // header("refresh: 3; url = https://newsmegamart.com/orders/");
    return redirect()->to('/pesanan/diproses')->with('success', 'Berhasil di tambah ke keranjang!');
  }

  public function detailProduct(Request $request)
  {
    $barcode = $request->barcode;
    $brg = Barang::where('barcode', $barcode)->get();
    return response()->json([
      'stok' => $brg->stok,
      'brg' => $brg,
    ]);
  }

  public function destroy($id)
  {
    Order::destroy($id);
    return back()->with('success', 'Barang berhasil dihapus dari keranjang!');
  }

  public function checkout()
  {
    $date = date('Y-m-d', strtotime(Carbon::now()));
    $a = 0604 + Order::count();
    $noFaktur = "SM-" . $date . Order::count() . $a;
    $Tgl_Jual = date('Y-m-d', strtotime(Carbon::now()));
    $brg = Keranjang::where(['kdUser' => auth()->user()->kdUser ?? ''])->orderBy('id')->get();

    return view('pages.checkout', [
      'title' => 'Checkout',
      'brg' => $brg,
      'total' => $brg->sum('subtotal'),
      'noFaktur' => $noFaktur,
      'Tgl_Jual' => $Tgl_Jual,
    ]);
  }

  public function update(Request $request)
  {
    //
  }

  // public function detailPesanan($noFaktur)
  // {
  //   // $noFaktur = $request->noFaktur;
  //   $brg = Order::where(['kdUser' => auth()->user()->kdUser ?? '', 'noFaktur' => $noFaktur])->orderBy('id')->get();
  //   return view('pages.pesanan.detail-pesanan', [
  //     'title' => 'Detail pesanan',
  //     'brg' => $brg,
  //     'total' => $brg->sum('subtotal'),
  //   ]);
  // }

  public function diproses() //ini diproses
  {
    $brg = Order::where(['kdUser' => auth()->user()->kdUser ?? '', 'status' => 0])->orderBy('id', 'asc')->get();
    foreach ($brg as $key => $b) {
      $noFaktur = $b->noFaktur;
    }
    return view('pages.pesanan.diproses', [
      'title' => 'Pesanan',
      'brg' => $brg,
      'total' => $brg->sum('subtotal'),
      'noFaktur' => $noFaktur ?? '',
    ]);
  }

  public function dikemas() //ini dikemas
  {
    $brgKemas = Order::where(['kdUser' => auth()->user()->kdUser ?? '', 'status' => 1])->orderBy('id', 'asc')->get();
    foreach ($brgKemas as $key => $b) {
      $noFaktur = $b->noFaktur;
    }
    return view('pages.pesanan.dikemas', [
      'title' => 'Pesanan',
      'brgKemas' => $brgKemas,
      'total' => $brgKemas->sum('subtotal'),
      'noFaktur' => $noFaktur ?? '',
    ]);
  }

  public function dikirim() //ini dikirim
  {
    $brgKirim = Order::where(['kdUser' => auth()->user()->kdUser ?? '', 'status' => 2])->orderBy('id', 'asc')->get();
    foreach ($brgKirim as $key => $b) {
      $noFaktur = $b->noFaktur;
    }
    return view('pages.pesanan.dikirim', [
      'title' => 'Pesanan',
      'brgKirim' => $brgKirim,
      'noFaktur' => $noFaktur ?? '',
      'total' => $brgKirim->sum('subtotal'),
    ]);
  }

  public function selesai() //ini selesai
  {
    // $data = Order::where(['kdUser' => auth()->user()->kdUser ?? '', 'status' => 3])->orderBy('id', 'asc')->get();
    // foreach ($data as $key => $b) {
    //   $noFaktur = $b->noFaktur;
    // }
    // $brgSelesai = RinciOrder::where('noFaktur', $noFaktur ?? '')->first();
    $brgSelesai = RinciOrder::where(['status' => 3, 'kdUser' => auth()->user()->kdUser ?? ''])->orderBy('id', 'asc')->get();


    return view('pages.pesanan.selesai', [
      'title' => 'Pesanan',
      'brgSelesai' => $brgSelesai,
      'total' => $brgSelesai->sum('subtotal'),
      'noFaktur' => $noFaktur ?? '',
      // 'data' => $data,
    ]);
  }

  public function dibatalkan() //ini dibatalkan
  {
    $brgBatal = Order::where(['kdUser' => auth()->user()->kdUser ?? '', 'status' => 4])->orderBy('id', 'asc')->get();

    foreach ($brgBatal as $key => $b) {
      $noFaktur = $b->noFaktur;
    }

    return view('pages.pesanan.dibatalkan', [
      'title' => 'Pesanan',
      'brgBatal' => $brgBatal,
      'total' => $brgBatal->sum('subtotal'),
      'noFaktur' => $noFaktur ?? '',
    ]);
  }





  // STATUS ORDER UNTUK ADMIN
  public function adminDiproses() //ini diproses
  {
    $brg = RinciOrder::where('status', 0)->orderBy('id', 'asc')->get();
    foreach ($brg as $key => $b) {
      $noFaktur = $b->noFaktur;
    }
    return view('kasir.pages.order.index', [
      'title' => 'Pesanan',
      'brg' => $brg,
      'total' => $brg->sum('subtotal'),
      'noFaktur' => $noFaktur ?? '',
    ]);
  }

  public function dataProses() //ini diproses
  {
    $brg = RinciOrder::where('status', 0)->orderBy('id', 'asc')->get();
    foreach ($brg as $key => $b) {
      $noFaktur = $b->noFaktur;
    }
    return response()->json([
      'brg' => $brg,
      'total' => $brg->sum('subtotal'),
      'noFaktur' => $noFaktur ?? '',
    ]);
  }

  public function adminDikemas() //ini dikemas
  {
    $brgKemas = RinciOrder::where('status', 1)->orderBy('id', 'asc')->get();
    return view('kasir.pages.order.dikemas', [
      'title' => 'Pesanan',
      'brgKemas' => $brgKemas,
      'total' => $brgKemas->sum('subtotal'),
    ]);
  }

  public function adminDikirim() //ini dikirim
  {
    $brgKirim = RinciOrder::where('status', 2)->orderBy('id', 'asc')->get();

    foreach ($brgKirim as $key => $b) {
      $noFaktur = $b->noFaktur ?? '';
    }
    $brgKirimb = Order::where('noFaktur', $noFaktur ?? '')->orderBy('id', 'asc')->get();
    // dd($brgKirimb);

    return view('kasir.pages.order.dikirim', [
      'title' => 'Pesanan',
      'brgKirim' => $brgKirim,
      'brgKirimb' => $brgKirimb,
      'total' => $brgKirim->sum('subtotal'),
    ]);
  }

  public function adminSelesai() //ini selesai
  {
    $brgSelesai = RinciOrder::where('status', 3)->orderBy('id', 'desc')->get();
    return view('kasir.pages.order.selesai', [
      'title' => 'Pesanan',
      'brgSelesai' => $brgSelesai,
      'total' => $brgSelesai->sum('subtotal'),
    ]);
  }

  public function adminDibatalkan() //ini batal
  {
    $brgBatal = Order::where('status', 4)->orderBy('id', 'asc')->get();

    return view('kasir.pages.order.dibatalkan', [
      'title' => 'Pesanan',
      'brgBatal' => $brgBatal,
      'total' => $brgBatal->sum('subtotal'),
    ]);
  }

  //show admin
  public function show(Request $request)
  {
    // dd($request->all());
    $noFaktur = $request->noFaktur;
    $data = RinciOrder::where('noFaktur', $noFaktur)->first();
    $brgKirimb = Order::where('noFaktur', $noFaktur ?? '')->get();
    $brg = Order::where(['noFaktur' => $request->noFaktur])->get();

    return view('kasir.pages.order.detail-pesanan', [
      'title' => 'Detail pesanan',
      'data' => $data,
      'brg' => $brg,
      'brgKirimb' => $brgKirimb,
    ]);
  }

  //show customer
  public function detail($noFaktur)
  {
    $data = RinciOrder::where('noFaktur', $noFaktur)->first();
    $brg = Order::where('noFaktur', $noFaktur)->get();
    return view('pages.pesanan.detail-pesanan', [
      'title'  => 'Detail pesanan',
      'data' => $data,
      'brg' => $brg,
    ]);
  }

  public function batalkanProduk(Request $request)
  {
    if ($request->status == 4) {
      $order = Order::where('noFaktur', $request->noFaktur)
        ->update(['status' => $request->status, 'alasanPembatalan' => $request->alasanPembatalan]);

      RinciOrder::where(['noFaktur' => $request->noFaktur, 'status' => 0])
        ->update(['subtotal' => $order->sum('subtotal')]);
      return redirect()->to('/orders')->with('success', 'Barang dibatalkan oleh penjual');
    }
  }

  public function print($noFaktur)
  {
    // dd($noFaktur);
    session(['noFaktur' => $noFaktur]);
    return redirect()->to('/showPrint');
  }

  public function showPrint(Request $request, $noFaktur)
  {
    $barang = Order::where(['noFaktur' => $noFaktur, 'status' => 3])->get();
    $totalItem = Order::where(['noFaktur' => $noFaktur, 'status' => 3])->sum('qty');
    $detail = RinciOrder::where('noFaktur', $noFaktur)->first();
    $time = Carbon::now();

    return view('kasir.pages.order.print', [
      'title' => 'Data print',
      'barang' => $barang,
      'totalItem' => $totalItem,
      'detail' => $detail,
      'time' => $time,
    ]);
  }
}
