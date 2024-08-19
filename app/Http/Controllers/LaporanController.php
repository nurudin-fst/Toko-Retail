<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Order;
use App\Models\Penjualan;
use App\Models\Barang;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $barang = Kasir::all();
    return view('kasir.pages.laporan.index', [
      "title" => 'Laporan',
      'barang' => $barang,
    ]);
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
    //
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

  public function date(Request $request)
  {
    $inputan = $request->date;
    $data = Kasir::where('tgl_jual', $request->date)->get();

    //menghitung omset & profit
    $profit = 0;
    $omset = 0;
    $hrgBeli = 0;
    foreach ($data as $item => $value) {
      $omset += $value['jmlhJual'] * $value['hrgJual'];
      $hrgBeli += $value['hrgBeli'];
      $profit += $omset - $hrgBeli;
    }

    return view('kasir.pages.laporan.laporan-detail', [
      'title' => "per tanggal $inputan - Smega Mart",
      'laporan' => $data,
      'inputan' => $inputan,
      'profit' => $profit,
      'omset' => $omset,
    ]);
  }

  public function month(Request $request)
  {
    $inputan = $request->month;
    $month = date('m', strtotime($inputan));
    $year = date('Y', strtotime($inputan));
    $data = Kasir::whereMonth('tgl_jual', [$month, $year])->get();

    //menghitung omset & profit
    $profit = 0;
    $omset = 0;
    $hrgBeli = 0;
    foreach ($data as $item => $value) {
      $omset += $value['jmlhJual'] * $value['hrgJual'];
      $hrgBeli += $value['hrgBeli'];
      $profit += $omset - $hrgBeli;
    }
    return view('kasir.pages.laporan.laporan-detail', [
      'title' => "Bulan $inputan - Smega Mart",
      'laporan' => $data,
      'inputan' => $inputan,
      'profit' => $profit,
      'omset' => $omset,
    ]);
  }

  public function year(Request $request)
  {
    $inputan = $request->year;
    $year = date('Y', strtotime($inputan));
    $data = Kasir::whereYear('tgl_jual', $inputan)->get();
    $profit = 0;
    $omset = 0;
    $hrgBeli = 0;
    foreach ($data as $item => $value) {
      $omset += $value['jmlhJual'] * $value['hrgJual'];
      $hrgBeli += $value['hrgBeli'];
      $profit += $omset - $hrgBeli;
    }

    return view('kasir.pages.laporan.laporan-detail', [
      'title' => "Tahun $inputan - Smega Mart",
      'laporan' => $data,
      'inputan' => $inputan,
      'profit' => $profit,
      'omset' => $omset,
    ]);
  }

  public function name(Request $request)
  {
    $inputan = $request->name;
    $data = Kasir::where('namaBarang', $inputan)->get();

    $profit = 0;
    $omset = 0;
    $hrgBeli = 0;
    foreach ($data as $item => $value) {
      $omset += $value['jmlhJual'] * $value['hrgJual'];
      $hrgBeli += $value['hrgBeli'];
      $profit += $omset - $hrgBeli;
    }

    return view('kasir.pages.laporan.laporan-detail', [
      'title' => "Tahun $inputan - Smega Mart",
      'laporan' => $data,
      'inputan' => $inputan,
      'profit' => $profit,
      'omset' => $omset,
    ]);
  }

  public function range(Request $request)
  {
    $first = date('Y-m-d', strtotime($request->first));
    $last = date('Y-m-d', strtotime($request->last));
    $firstDate = date('Y-m-d', strtotime($request->first));
    $lastDate = date('Y-m-d', strtotime($request->last));

    $inputan =  "$firstDate sampai $lastDate";

    $data = Kasir::whereBetween('tgl_jual', [$first, $last])->get();
    // dd($data);

    $profit = 0;
    $omset = 0;
    $hrgBeli = 0;
    foreach ($data as $item => $value) {
      $omset += $value['jmlhJual'] * $value['hrgJual'];
      $hrgBeli += $value['hrgBeli'];
      $profit += $omset - $hrgBeli;
    }

    return view('kasir.pages.laporan.laporan-detail', [
      'title' => "Tahun $inputan - Smega Mart",
      'laporan' => $data,
      'inputan' => $inputan,
      'profit' => $profit,
      'omset' => $omset,
    ]);
  }

  public function generatePdf()
  {
    $laporan = Kasir::all();
    $pdf = PDF::loadView('coba', ['laporan' => $laporan]);
    return $pdf->download("laporanTahun.pdf");
  }
}
