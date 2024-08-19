@extends('admin.layouts.template')
@section('content')
    @if (session()->has('success'))
        <div id="alert-3" class="mb-4 flex rounded-lg bg-green-100 p-4 dark:bg-green-200" role="alert">
            <svg aria-hidden="true" class="h-5 w-5 flex-shrink-0 text-green-700 dark:text-green-800" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session('success') }}
            </div>
            <button type="button"
                class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-green-100 p-1.5 text-green-500 hover:bg-green-200 focus:ring-2 focus:ring-green-400 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="POST" class="mb-6" enctype="multipart/form-data">
        @csrf
        <div class="mb-6 grid gap-6 md:grid-cols-2">
            <div>
                <label for="barcode" class="mb-2 block text-sm font-medium">Barcode</label>
                <input type="text" id="barcode"
                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="No. Barcode" name="barcode" value="{{ old('barcode') }}">
                <span>
                    @error('barcode')
                        <b class="text-red">{{ $message }}</b>
                    @enderror
                </span>
            </div>
            <div>
                <label for="name" class="mb-2 block text-sm font-medium">Nama Barang</label>
                <input type="text" id="namaBarang"
                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Nama Produk" name="namaBarang" value="{{ old('namaBarang') }}">
                <input type="hidden" name="slug" id="slug" value="{{ old('slug') }}">
            </div>
            <div>
                <label for="purchase_price" class="mb-2 block text-sm font-medium">Harga Beli</label>
                <input type="number" id="hrgBeli"
                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Harga Beli" name="hrgBeli" value="{{ old('hrgBeli') }}">
            </div>
            <div>
                <label for="price" class="mb-2 block text-sm font-medium">Harga Jual</label>
                <input type="number" id="hrgJual"
                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Harga Jual" name="hrgJual" value="{{ old('hrgJual') }}">
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="stock_store" class="mb-2 block text-sm font-medium">Satuan</label>
                    <select name="kdSatuan" id="kdSatuan"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="" class="hover:bg-blue-600 hover:text-white">Pilih Satuan</option>
                        @foreach ($satuan as $s)
                            <option value="{{ $s->kdSatuan }}" class="uppercase">{{ $s->namaSatuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="stock_store" class="mb-2 block text-sm font-medium">Kategori</label>
                    <select name="kdKategori" id="kdKategori"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="">Pilih Kategori</option>
                        @foreach ($kategori as $k)
                            <option value="{{ $k->kdKategori }}">{{ $k->namaKategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="stock_storage" class="mb-2 block text-sm font-medium">Stok Gudang</label>
                    <input type="number" id="stokGudang"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Stok Gudang" name="stok_gudang" value="{{ old('stok_gudang') }}">
                </div>
                <div>
                    <label for="stock_store" class="mb-2 block text-sm font-medium">Stok Toko</label>
                    <input type="number" id="stokToko"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Stok Toko" name="stok" value="{{ old('stok') }}">
                </div>
            </div>
        </div>

        <div>
            <label for="image_main" class="mb-2 block text-sm font-medium">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi"
                class="block h-28 w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Deskripsi Produk">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="w-full">
            <label for="image_main" class="mb-3 block text-sm font-medium">Gambar utama</label>
            <input type="file" id="image_main"
                class="block w-full rounded-lg border border-gray-300 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Image" name="cloud_img">
        </div>

        <div class="mt-5">
            <label for="images" class="mb-3 block text-left text-sm font-medium md:text-center">Gambar lain (tidak
                wajib)</label>
            <div class="grid gap-6 md:grid-cols-3">
                <div>
                    <input type="file" id="images"
                        class="block w-full rounded-lg border border-gray-300 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Images" name="images[]">
                </div>
                <div>
                    <input type="file" id="images"
                        class="block w-full rounded-lg border border-gray-300 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Images" name="images[]">
                </div>
                <div>
                    <input type="file" id="images"
                        class="block w-full rounded-lg border border-gray-300 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Images" name="images[]">
                </div>
            </div>

        </div>
        <div class="mb-6">
            <button type="submit" id="btnTambah"
                class="mt-3 w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
            <a href="/dashboard/products" type="button"
                class="mt-3 w-full rounded-lg bg-gray-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto">Batal</a>
        </div>
    </form>


    {{-- jQuery Script --}}
    {{-- <script src="/js/jquery-3.6.0.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#namaBarang').change(function(e) {
            $.get('{{ url('check_slug_barang') }}', {
                    'namaBarang': $(this).val()
                },
                function(data) {
                    $('#slug').val(data.slug);
                    console.log(data.slug);
                }
            );
        });

        // $(document).on("click", "#btnTambah", function(e) {
        //     e.preventDefault();
        //     setTimeout(function() { // wait for 5 secs(2)
        //         location.reload(true); // then reload the page.(3)
        //     }, 1000);
        // })

        // $(document).ready(function() {

        //     $(document).on("click", '#btnTambah', function(e) {
        //         e.preventDefault();

        //         var data = {
        //             'barcode': $('#barcode').val(),
        //             'namaBarang': $('#namaBarang').val(),
        //             'slug': $('#slug').val(),
        //             'hrgJual': $('#hrgJual').val(),
        //             'hrgBeli': $('#hrgBeli').val(),
        //             'kdSatuan': $('#kdSatuan').val(),
        //             'kdKategori': $('#kdKategori').val(),
        //             'stok': $('#stokToko').val(),
        //             'stok_gudang': $('#stokGudang').val(),
        //             'cloud_img': $('#image_main').val(),
        //             'images[]': $('#images').val(),

        //         }
        //         console.log(data);

        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         $.ajax({
        //             type: "POST",
        //             url: "{{ route('products.store') }}",
        //             data: data,
        //             dataType: "json",
        //             success: function(response) {
        //                 $('#barcode').focus();
        //                 // setTimeout(function() { // wait for 5 secs(2)
        //                 //     location.reload(true); // then reload the page.(3)
        //                 // }, 0);
        //             }
        //         })
        //     });

        // }); //end document ready
    </script>
@endsection
