<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class GaleriController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.pages.galeri.index', [
      'title' => 'Galeri',
      'galeri' => Galeri::all(),
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
    if ($request->hasFile("cloud_img")) {
      $files = $request->file("cloud_img");
      // foreach ($files as $file) {
      $images = Cloudinary::upload($files->getRealPath(), ['folder' => 'galleries']);
      $public_id = $images->getPublicId();
      $url = $images->getSecurePath();
      Galeri::create([
        'cloud_img' => $public_id,
        'img_urls' => $url,
      ]);
      // dd($galeri);
      // }
    }
    return back()->with("success", "Berhasil ditambah!!");
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Galeri  $galeri
   * @return \Illuminate\Http\Response
   */
  public function show(Galeri $galeri)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Galeri  $galeri
   * @return \Illuminate\Http\Response
   */
  public function edit(Galeri $galeri)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Galeri  $galeri
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Galeri $galeri)
  {
    $galeri = Galeri::findOrFail($galeri->kdGaleri);

    if ($request->hasFile('cloud_img')) {
      $rules = [
        'cloud_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ];
      $request->validate($rules);

      $file = $request->file('cloud_img');
      $image = Cloudinary::upload($file->getRealPath(), ['folder' => 'galleries']);
      $public_id = $image->getPublicId();
      $url = $image->getSecurePath();

      $image = [
        "cloud_img" => $public_id,
        "img_urls" => $url,
      ];
      $galeri->where('barcode', $galeri->kdGaleri)
        ->update($image);
    }

    return back()->with("success", "Berhasil ditambah!!");
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Galeri  $galeri
   * @return \Illuminate\Http\Response
   */
  public function destroy(Galeri $galeri)
  {
    //
  }
}
