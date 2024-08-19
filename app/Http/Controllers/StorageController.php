<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Storage;
use App\Models\Pembelian;
use App\Models\Suplier;
use App\Models\Storagepembelian;
use Carbon\Carbon;
use App\Models\Gambar;
use Illuminate\Support\Facades\DB;
use PDF;

use Illuminate\Http\Request;

class StorageController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $barang = Barang::withOut(['supplier']);
    return view('admin.pages.storage.index', [
      'title' => 'Gudang',
      'products' => $barang->select('barcode', 'namaBarang', 'hrgBeli', 'hrgJual', 'stok', 'stok_gudang', 'img_urls')->get(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $no = Pembelian::count() + 1;
    $noFakturBeli = "FB" . date('d-m-Y', strtotime(Carbon::now())) . $no;
    $pembelian = Storage::where('noFakturBeli', $noFakturBeli)->get();

    // $subtotal = $pembelian->sum('hrgBeli') * $pembelian->sum('jmlBeli');

    $tglBeli = date('Y-m-d', strtotime(Carbon::now()));

    $supplier = Suplier::withOut(['supplier'])->get();

    if (session(['id' => 'noFakturBeli'])) {
      return view('admin.pages.storage.create', [
        'title' => 'Tambah Barang',
        'pembelian' => $pembelian,
        'noFakturBeli' => $noFakturBeli,
        // 'subtotal' => $subtotal,
        'tglBeli' => $tglBeli,
        'supplier' => $supplier,
      ]);
    } else {
      return view('admin.pages.storage.create', [
        'title' => 'Tambah Barang',
        'pembelian' => $pembelian,
        'noFakturBeli' => $noFakturBeli,
        // 'subtotal' => $subtotal,
        'tglBeli' => $tglBeli,
        'supplier' => $supplier,
      ]);
    }
  }

  public function getBarcodeData()
  {
    if (request()->barcode != null) {
      $barang = Barang::select('barcode', 'namaBarang', 'hrgJual', 'hrgBeli')->where('barcode', request()->barcode);
      // dd($barang);
      if ($barang->exists()) {
        $data = $barang->first();

        return response()->json([
          'message' => 'Berhasil mengambil data',
          'barang' => [
            "barcode" => $data->barcode,
            "namaBarang" => $data->namaBarang,
            "hrgBeli" => $data->hrgBeli,
            "hrgJual" => $data->hrgJual,
          ],
        ]);
      } else {
        return response()->json([
          'message' => 'Data kosong',
          'barang' => null
        ]);
      }
    } else {
      return response()->json([
        'message' => 'Barcode kosong',
        'barang' => null
      ]);
    }
  }

  public function getDetailData($noFakturBeli)
  {
    $now = date('Y-m-d', strtotime(Carbon::now()));
    $no = Pembelian::count() + 1;
    $noFaktur = "FB" . date('d-m-Y', strtotime(Carbon::now())) . $no;
    $pembelian = Storage::where('noFakturBeli', $noFaktur)->get();
    // $total2 = DB::select("select ifnull(sum(hrgBeli*jmlBeli),0) as total from tabelrealpembelian where noFakturBeli =  '$noFaktur'");
    // foreach ($total2 as $key => $t) {
    //   $total = $t->total;
    // }

    $total = 0;
    foreach ($pembelian as $p) {
      $total += ($p['jmlBeli'] + $p['jmlStokGudang']) * $p['hrgBeli'];
    }
    if (request('bayar') == "") {
      $kembali = 0;
    } else {
      $kembali = request('bayar') - $total;
    }
    // dd($pembelian);

    return response()->json([
      'pembelian' => $pembelian,
      'total' => $total,
      'now' => $now,
      'kembali' => $kembali,
    ]);
  }


  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // dd($request->all());
    $b = Storage::create($request->all());
    session(['id' => 'noFakturBeli']);
    return response()->json($b);
  }

  public function simpan(Request $request)
  {
    // $validated = [
    //   'noFakturBeli' => 'required',
    //   'tglBeli' => 'required',
    //   'kdSupplier' => 'required',
    //   'kdUser' => 'required',
    // ];
    // $request->validate($validated);

    // dd($request->all());
    $b = Pembelian::create([
      'noFakturBeli' => $request->noFakturBeli,
      'tglBeli' => $request->tglBeli,
      'kdSupplier' => $request->kdSupplier ?? '',
      'kdUser' => auth()->user()->kdUser ?? '',
      'bayar' => $request->bayar,
    ]);
    // $b = Pembelian::create($request->all());
    // $request->session()->forget('id');
    // return response()->json($b);
    session(['noFakturBeli' => $request->noFakturBeli]);
    return redirect()->to('/printPembelian');
  }

  public function print()
  {
    $noFaktur = session('noFakturBeli');
    $product = Storage::where('noFakturBeli', session('noFakturBeli'))->get();
    $totalItem = Storage::where('noFakturBeli', session('noFakturBeli'))->sum('jmlBeli');
    $detail = Storagepembelian::where('noFakturBeli', session('noFakturBeli'))->first();
    $total2 = 0;
    foreach ($product as $key => $value) {
      $total2 += $value['hrgBeli'] * ($value['jmlBeli'] + $value['jmlStokGudang']);
    }
    // dd($noFaktur, $product, $detail);
    // dd($detail, $product);
    $time = Carbon::now();
    $pelanggan = Suplier::select('namaSupplier')->where('kdSupplier', $detail->kdSupplier)->first();
    // dd($pelanggan);

    return view('admin.pages.storage.notaPembelian', [
      'detail' => $detail,
      'product' => $product,
      'time' => $time,
      'totalItem' => $totalItem,
      'total' => $total2,
      'pelanggan' => $pelanggan,
    ]);
  }

  public function forgetSessionStorage(Request $request)
  {
    $request->session()->forget('noFakturBeli');
    return redirect()->to('storage/create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    // update stok toko
    $images = Gambar::where('barcode', $id)->get();
    $product = Barang::findOrFail($id);
    return view('admin.pages.storage.stock_toko', [
      'title' => 'Tambah stok ke toko',
      'product' => $product,
      'images' => $images,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //update stok Gudang
    $images = Gambar::where('barcode', $id)->get();
    return view('admin.pages.storage.stock_gudang', [
      'title' => 'Tambah stok ke gudang',
      'product' => Barang::findOrFail($id),
      'images' => $images,
    ]);
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
    $product = Barang::findOrFail($id);
    if ($request->stock_toko) {
      if ($product->stok_gudang <= 0) {
        return back()->with('error', 'Stok gudang kosong maka tidak bisa ditambah ke toko');
      } else {
        $product->update([
          'stok' => $request->stock_toko + $product->stok,
          'stok_gudang' => $product->stok_gudang - $request->stock_toko,
        ]);
        return redirect()->to('storage')->with('success', 'Stok berhasil diupdate');
      }
    }

    if ($request->stock_gudang) {
      $product->update([
        'stok_gudang' => $product->stok_gudang + $request->stock_gudang,
      ]);
    }

    return back();
    // return redirect()->to('storage')->with('success', 'Stok berhasil diupdate');
  }

  public function updateJml(Request $request, $id)
  {
    $data = Storage::find($id);
    $data->update(['jmlBeli' => $request->jmlBeli, 'jmlStokGudang' => $request->jmlStokGudang]);
    return back();
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    // dd($id);
    Storage::find($id)->delete();
    return back()->with('success', 'Berhasil dihapus');
  }

  public function exportPdf()
  {
    $noFaktur = session('noFakturBeli');
    $product = Storage::where('noFakturBeli', session('noFakturBeli'))->get();
    $totalItem = Storage::where('noFakturBeli', session('noFakturBeli'))->sum('jmlBeli');
    $detail = Storagepembelian::where('noFakturBeli', session('noFakturBeli'))->first();
    $total = DB::select("select ifnull(sum(hrgBeli*jmlBeli),0) as total from tabelrealpembelian where noFakturBeli =  '$noFaktur'");
    foreach ($total as $key => $value) {
      $total2 = $value->total;
    }
    // dd($noFaktur, $product, $detail);
    // dd($detail, $product);
    $time = Carbon::now();
    $pelanggan = Suplier::select('namaSupplier')->where('kdSupplier', $detail->kdSupplier)->first();

    $pdf  = PDF::loadView('admin.pages.storage.pdf', [
      'product' => $product,
      'totalItem' => $totalItem,
      'detail' => $detail,
      'total' => $total2,
      'title'  => "$detail->noFakturBeli"
    ]);

    // // $pdf->setPaper('a4', 'potrait');
    $pdf->setPaper('potrait');

    // return $pdf->download('noFaktur.pdf');
    return $pdf->download("Laporan-$detail->noFakturBeli" . date('Y-m-d-his') . '.pdf');
  }

  public function historiPembelian()
  {
    $data = Storagepembelian::orderBy('tglBeli')->paginate(10)->withQueryString();
    return view('admin.pages.storage.historiPembelian', [
      'title' => 'Histori Pembelian',
      'data' => $data,
    ]);
  }

  public function exportPdfHistori(Request $request)
  {
    $noFakturBeli = $request->noFakturBeli;
    $product = Storage::where('noFakturBeli', $request->noFakturBeli)->get();
    $totalItem = Storage::where('noFakturBeli', $noFakturBeli)->sum('jmlBeli');
    $detail = Storagepembelian::where('noFakturBeli', $noFakturBeli)->first();
    $total2 = 0;
    foreach ($product as $key => $value) {
      $total2 += $value['hrgBeli'] * ($value['jmlBeli'] + $value['jmlStokGudang']);
    }
    // dd($noFakturBeli, $product, $detail);
    // dd($detail, $product);

    $pdf  = PDF::loadView('admin.pages.storage.pdf', [
      'product' => $product,
      'totalItem' => $totalItem,
      'detail' => $detail,
      'total' => $total2,
    ]);

    // // $pdf->setPaper('a4', 'potrait');
    $pdf->setPaper('potrait');

    // return $pdf->download('noFaktur.pdf');
    return $pdf->download("Laporan-$detail->noFakturBeli" . date('Y-m-d-his') . '.pdf');
  }
}
