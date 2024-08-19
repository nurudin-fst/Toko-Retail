<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $brg = Keranjang::where(['kdUser' => auth()->user()->kdUser ?? ''])->get();
    return view('pages.cart', [
      'title' => 'Keranjang',
      'brg' => $brg,
    ]);
  }

  public function dataCart(Request $request, $id)
  {
    $brg = Keranjang::find($id);
    // dd($brg->hrgJual);
    $qty = $brg->update(['qty' => $request->qty ?? '', 'subtotal' => $request->qty * $brg->hrgJual]);
    // return response()->json([
    //   'brg' => $brg,
    //   'qty' => $qty,
    // ]);
    return back();
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
    // if ($request->stok <= 0) {
    //   return back()->with('error', 'Stok barang kosong tidak bisa ditambahkan');
    // }

    $request->validate(
      [
        'barcode' => 'required',
        'namaBarang' => 'required',
        'hrgJual' => 'required',
        'qty' => 'required',
        'kdUser' => 'required',
        'subtotal' => 'required',
      ],
      [
        'kdUser.required' => 'Login terlebih dahulu',
      ]
    );
    // dd($request->all());

    // $validated = $request->validate($request->all());
    Keranjang::create([
      'barcode' => $request->barcode,
      'namaBarang' => $request->namaBarang,
      'hrgJual' => $request->hrgJual,
      'qty' => $request->qty,
      'kdUser' => $request->kdUser,
      'subtotal' => $request->qty * $request->hrgJual,
    ]);

    return back()->with('success', 'Berhasil ditambah ke keranjang!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Keranjang  $keranjang
   * @return \Illuminate\Http\Response
   */
  public function show(Keranjang $keranjang)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Keranjang  $keranjang
   * @return \Illuminate\Http\Response
   */
  public function edit(Keranjang $keranjang)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Keranjang  $keranjang
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Keranjang $keranjang)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Keranjang  $keranjang
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    Keranjang::destroy($id);
    return back()->with('success', 'Berhasil dihapus');
  }
}
