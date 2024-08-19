<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\RinciOrderController;
use App\Http\Controllers\KategoriController;

use Illuminate\Support\Facades\Route;
use Cviebrock\EloquentSluggable\Services\SlugService;

// Routing

// Home Route
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [HomeController::class, 'product']);
Route::get('/products/{product:slug}', [HomeController::class, 'productDetail']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/gallery', [HomeController::class, 'gallery']);

// Auth Route
Route::get('/registration', [AuthController::class, 'indexRegistration'])->middleware('guest')->name('registration');
Route::post('/registration', [AuthController::class, 'registration']);
Route::get('/loginView', [AuthController::class, 'indexLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

//route jumlah item keranjang
Route::get('/cartsum', [HomeController::class, 'cartsum']);
Route::get('/product/{slug}', [OrderController::class, 'detailProduct']);

//route customer
Route::middleware(['auth'])->group(function () {
  Route::resource('auth', AuthController::class);

  //route keranjang
  Route::resource('order', OrderController::class);
  Route::resource('keranjang', KeranjangController::class);
  Route::get('/keranjang', [KeranjangController::class, 'index']);
  Route::delete('/order/{id}', [OrderController::class],);
  Route::get('/cart', [HomeController::class, 'cart']);
  Route::get('/checkout', [OrderController::class, 'checkout']);

  //route checkout dan prosesnya
  // Route::post('/pesan/{id}', [OrderController::class, 'pesan']);
  Route::post('/pesan', [OrderController::class, 'store'])->name('pesan');

  //profile
  Route::get('/profil', [HomeController::class, 'profil']);
  Route::post('/userUpdate', [AuthController::class, 'update'])->name('updateProfil');

  //ROute pesanan customer
  Route::get('/pesanan/diproses', [OrderController::class, 'diproses']);
  Route::get('/pesanan/dikemas', [OrderController::class, 'dikemas']);
  Route::get('/pesanan/dikirim', [OrderController::class, 'dikirim']);
  Route::get('/pesanan/selesai', [OrderController::class, 'selesai']);
  Route::get('/pesanan/dibatalkan', [OrderController::class, 'dibatalkan']);
  Route::get('/pesanan/detail/{noFaktur}', [OrderController::class, 'detail']);

  //route detail pesanan
  // Route::get('/detail-pesanan/{noFaktur}', [OrderController::class, 'detailPesanan']);
});

// Routing Admin
Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [AdminController::class, 'index']);

  //Route product
  Route::resource('/dashboard/products', BarangController::class);
  Route::get('/store', [BarangController::class, 'store']);
  Route::get('/dashboard/products/list', [BarangController::class, 'list'])->name('product.data');
  Route::get('/kasir-barcode-data', [KasirController::class, 'getBarcodeData'])->name('searchBarang');


  Route::resource('storage', StorageController::class);
  Route::get('/print/{noFaktur}', [OrderController::class, 'print']);
  Route::get('/showPrint/{noFaktur}', [OrderController::class, 'showPrint']);

  // //Route Gudang
  // Route::get('/stock-store/{id}', [StorageController::class, 'store']);
  // Route::post('stock-store/{id}', [StorageController::class, 'updateStore']);
  // Route::get('/stock-storage/{id}', [StorageController::class, 'storage']);

  //Route suplier, satuan, galleri
  Route::resource('suplier', SuplierController::class);
  Route::resource('unit', SatuanController::class);
  Route::resource('galleries', GaleriController::class);

  //Route User
  Route::resource('user', UserController::class);

  //Route Order
  Route::get('/orders', [OrderController::class, 'adminDiproses']);
  Route::get('/orders/data', [OrderController::class, 'dataProses']);
  Route::get('/detailProduct/{slug}', [OrderController::class, 'detailProduct'])->name('detailProduct');

  //route order admin
  Route::post('/orders/{id}', [RinciOrderController::class, 'updateDiproses'])->name('diproses.kasir');
  Route::resource('rinci', RinciOrderController::class);

  //ROute pesanan admin view
  // Route::get('/orders/diproses', [OrderController::class, 'adminDiproses']);
  Route::get('/orders/dikemas', [OrderController::class, 'adminDikemas']);
  Route::get('/orders/dikirim', [OrderController::class, 'adminDikirim']);
  Route::get('/orders/selesai', [OrderController::class, 'adminSelesai']);
  Route::get('/orders/dibatalkan', [OrderController::class, 'adminDibatalkan']);
  Route::post('/orders/batalkanProduk/{id}', [OrderController::class, 'batalkanProduk']);
  Route::get('/pesanan/detail/{noFaktur}', [OrderController::class, 'detail']);

  Route::get('/updateQty/{id}', [OrderController::class, 'updateQty']);
  Route::get('/dataCart/{id}', [KeranjangController::class, 'dataCart']);


  //Route kasir
  Route::resource('kasir', KasirController::class);

  //route penjualan kasir
  // Route::get('/kasir/databrg', [KasirController::class, 'getBarang'])->name('getBarang');
  Route::get('/brg', [KasirController::class, 'brgKasir'])->name('brgKasir');

  Route::post('/kasir/store', [KasirController::class, 'store'])->name('transaksi.store');
  Route::get('/kasir/detail/{noFakturJualan}', [KasirController::class, 'getDetailData'])->name('transaksi.detail');
  Route::post('/kasir/store/simpan', [KasirController::class, 'simpan'])->name('transaksi.simpan');
  Route::get('/kasir/show/{noFakturJualan}', [KasirController::class, 'show'])->name('print.transaksi');
  Route::get('/selesai', [KasirController::class, 'selesai'])->name('selesai');
  Route::get('/print', [KasirController::class, 'print'])->name('print');
  Route::delete('/hapusPesanan', [KasirController::class, 'hapusPesanan'])->name('hapusPesanan');
  Route::post('/updateJumlah', [KasirController::class, 'updateQty'])->name('updateQty');

  //route gudang tambah stok
  Route::get('/printPembelian', [StorageController::class, 'print'])->name('printPembelian');
  Route::get('/forgetSessionStorage', [StorageController::class, 'forgetSessionStorage'])->name('forgetSessionStorage');
  Route::get('/exportPdf', [StorageController::class, 'exportPdf'])->name('exportPdf');
  Route::get('/exportPdfHistori', [StorageController::class, 'exportPdfHistori'])->name('exportPdfHistori');
  Route::post('/updateJml/{id}', [StorageController::class, 'updateJml'])->name('updateJml');


  //route pembelian admin
  Route::post('/admin/store', [StorageController::class, 'store'])->name('pembelian.store');
  Route::get('/admin/detail/{noFakturBeli}', [StorageController::class, 'getDetailData'])->name('pembelian.detail');
  Route::post('/admin/store/simpan', [StorageController::class, 'simpan'])->name('pembelian.simpan');
  Route::get('/historiPembelian', [StorageController::class, 'historiPembelian'])->name('historiPembelian');


  Route::get('/forgetSession', [KasirController::class, 'forgetSession'])->name('forget');

  Route::resource('laporan', LaporanController::class);

  Route::get('data', [BarangController::class, 'data'])->name('dataBarang');

  //route laporan
  Route::post('/laporan/date', [LaporanController::class, 'date']);
  Route::post('/laporan/month', [LaporanController::class, 'month']);
  Route::post('/laporan/year', [LaporanController::class, 'year']);
  Route::post('/laporan/name', [LaporanController::class, 'name']);
  Route::post('/laporan/range', [LaporanController::class, 'range']);

  Route::get('/laporan/pdf', [LaporanController::class, 'generatePdf']);


  //route kategori
  Route::resource('category', KategoriController::class);

  //hapus cover gambar utama dan gambar lain
  // Route::delete('/deletecover/{barcode}', [BarangController::class, 'deletecover']);
  Route::delete('/deletecover/{barcode}', [BarangController::class, 'deletecover']);
  Route::delete('/deletegambar/{barcode}', [BarangController::class, 'deletegambar']);

  //slug
  Route::get('check_slug_supplier', function () {
    $slug = SlugService::createSlug(App\Models\Satuan::class, 'slug', request('namaSupplier'));
    return response()->json(['slug' => $slug]);
  });
  Route::get('check_slug_barang', function () {
    $slug = SlugService::createSlug(App\Models\Barang::class, 'slug', request('namaBarang'));
    return response()->json(['slug' => $slug]);
  });
});
