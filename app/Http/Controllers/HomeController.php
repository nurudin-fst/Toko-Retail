<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Gambar;
use App\Models\Keranjang;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

  public function index()
  {
    return view('pages.home', [
      "title" => "Belanja di toko & belanja online hanya disini!! Toko kebutuhan sehari-hari terlengkap di Purbalingga",
    ]);
  }

  public function product(Request $request)
  {
    $products = Barang::withOut(['supplier']);

    if ($request->input('search')) {
      $products->search($request->search);
    }

    if ($request->input('category') !== "all") {
      $category = $request->category;
      $products->whereHas(
        'kategori',
        function ($query) use ($category) {
          $query->where('slug', 'LIKE', "%{$category}%");
        }
      );
    }

    return view('pages.product.products', [
      "title" => "Produk",
      "categories" => Kategori::select('namaKategori', 'slug')->orderBy('namaKategori', 'asc')->get(),
      "products" => $products->latest()->paginate(8)->withQueryString(),
    ]);
  }

  public function cartSum()
  {
    $cartsum = Keranjang::where(['kdUser' => auth()->user()->kdUser ?? ''])->sum('qty');
    return response()->json([
      'cartsum' => $cartsum,
    ]);
  }

  public function productDetail(Barang $product)
  {
    $images = Gambar::where('barcode', $product->barcode)->get();

    return view('pages.product.product-detail', [
      "title" => $product->namaBarang,
      "product" => $product,
      "images" => $images,
      // "noFaktur" => $noFaktur,
    ]);
  }

  public function about()
  {
    return view('pages.about', [
      "title" => "Tentang Kami",
    ]);
  }

  public function contact()
  {
    return view('pages.contact', [
      "title" => "Kontak Kami",
    ]);
  }

  public function gallery()
  {

    $galleryImg = \File::allFiles(public_path('assets/img/gallery'));

    return view('pages.gallery', [
      "title" => "Galeri",
      "images" => $galleryImg,
    ]);
  }

  public function cart()
  {
    $brg = Keranjang::where(['kdUser' => auth()->user()->kdUser ?? ''])->orderBy('id')->get();
    $total = $brg->sum('subtotal');
    return view('pages.cart', [
      'title' => 'Keranjang',
      'brg' => $brg,
      'total' => $total,
    ]);
  }

  public function profil()
  {
    $user = User::where('kdUser', auth()->user()->kdUser ?? '')->first();
    return view('pages.profile', [
      'title' => 'Profil saya',
      'user' => $user,
    ]);
  }
}
