<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use Illuminate\Support\Str;


class SatuanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.unit.index', [
      'title' => 'Satuan',
      'satuans' => Satuan::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.pages.unit.create', [
      'title' => 'Tambah Unit',
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
    $rules = [
      'namaSatuan' => 'required|unique:tabelsatuan',
    ];
    $validatedData = $request->validate($rules);
    Satuan::create($validatedData);

    return back()->with('success', 'Satuan berhasil ditambahkan!');
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
  public function update(Request $request, $kdSatuan)
  {
    $suplier = Satuan::findOrFail($kdSatuan);
    if ($request->namaSatuan != $suplier->namaSatuan) {
      $rules['namaSatuan'] = 'required|unique:tabelsatuan';
    }
    $validatedData = $request->validate($rules);
    $suplier->update($validatedData);
    return back()->with('success', 'Satuan berhasil di edit!!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $satuan = Satuan::findOrFail($id);
    $satuan->delete($satuan->id);
    return back()->with('success', 'Satuan berhasil dihapus!');
  }
}
