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

    <div class="grid grid-cols-1 gap-6">
        <form action="{{ route('products.update', [$barang->barcode]) }}" method="POST" class="mb-6"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-6 grid gap-6 md:grid-cols-2">
                <div>
                    <label for="barcode" class="mb-2 block text-sm font-medium">Barcode</label>
                    <input type="text" id="barcode"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="No. Barcode" name="barcode" value="{{ $barang->barcode }}">
                    @error('barcode')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                </div>
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium">Nama Barang</label>
                    <input type="text" id="namaBarang"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Nama Produk" name="namaBarang" value="{{ $barang->namaBarang }}">

                    <input type="hidden" class="form-control" id="slug" placeholder="Slug" name="slug"
                        value="{{ $barang->slug }}">
                </div>
                <div>
                    <label for="purchase_price" class="mb-2 block text-sm font-medium">Harga Beli</label>
                    <input type="number" id="purchase_price"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Harga Beli" name="hrgBeli" value="{{ $barang->hrgBeli }}">
                </div>
                <div>
                    <label for="price" class="mb-2 block text-sm font-medium">Harga Jual</label>
                    <input type="number" id="price"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Harga Jual" name="hrgJual" value="{{ $barang->hrgJual }}">
                </div>
                <div>
                    <label for="stock_store" class="mb-2 block text-sm font-medium">Satuan</label>
                    <select name="kdSatuan" id=""
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        <option value="" class="hover:bg-blue-600 hover:text-white">Pilih Satuan</option>
                        @foreach ($satuan as $s)
                            <option value="{{ $s->kdSatuan }}"
                                @if ($s->kdSatuan == $barang->kdSatuan) {{ 'selected' }} @endif>
                                {{ $s->namaSatuan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-1">
                    <div>
                        <label for="stock_store" class="mb-2 block text-sm font-medium">Kategori</label>
                        <select name="kdKategori" id=""
                            class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->kdKategori }}"
                                    @if ($k->kdKategori == $barang->kdKategori) {{ 'selected' }} @endif>
                                    {{ $k->namaKategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="stock_storage" class="mb-2 block text-sm font-medium">Stok Gudang</label>
                    <input type="number" id="stock_storage"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Stok Gudang" name="stok_gudang" value="{{ $barang->stok_gudang }}">
                </div>
                <div>
                    <label for="stock_store" class="mb-2 block text-sm font-medium">Stok Toko</label>
                    <input type="number" id="stock_store"
                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Stok Toko" name="stok" value="{{ $barang->stok }}">
                </div>
            </div>

            <div>
                <label for="image_main" class="mb-2 block text-sm font-medium">Deskripsi</label>
                <textarea name="deskripsi" id=""
                    class="block h-28 w-full rounded-lg border border-gray-300 p-2.5 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Deskripsi Produk">{{ $barang->deskripsi }}</textarea>
            </div>

            <label for="image_main" class="mb-3 mt-5 block text-center text-lg font-medium">Gambar utama<br>
                @if ($barang->cloud_img != '')
                    <b class="text-sm">Gambar utama sudah ada, hapus terlebih dahulu jika ingin menggantinya!</b>
                @else
                    <input type="file" id="image_main"
                        class="block w-full rounded-lg border border-gray-300 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Image" name="cloud_img">
                @endif
            </label>

            <label for="images" class="mb-3 mt-5 block text-left text-lg font-bold md:text-center">Gambar lain (tidak
                wajib) <br>
                <div class="mt-5 grid gap-6 md:grid-cols-3">
                    @if (count($gambar) == 1)
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
                    @elseif (count($gambar) == 2)
                        <div>
                            <input type="file" id="images"
                                class="block w-full rounded-lg border border-gray-300 text-sm shadow-md focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Images" name="images[]">
                        </div>
                    @elseif (count($gambar) == 3)
                        <b class="text-center">Gambar penuh</b>
                    @else
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
                    @endif
                </div>
            </label>

            <div class="flex">
                <button
                    class="relative rounded-lg bg-blue-700 p-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" data-modal-toggle="defaultModal">
                    Gambar
                </button>
                <div class="rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-200 dark:text-red-800"
                    role="alert">
                    <span class="font-medium">Hapus gambar terlebih dahulu jika ingin menggantinya!</span>
                </div>
            </div>
            <div class="mt-8 mb-8">
                <button type="submit"
                    class="w-full rounded-lg bg-blue-700 p-3 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Simpan</button>
                <a href="/dashboard/products" type="button"
                    class="w-full rounded-lg bg-gray-700 p-3 text-center text-sm font-medium text-white hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800 sm:w-auto">Batal</a>
            </div>
        </form>
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 right-0 left-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-2xl p-4 md:h-auto">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Gambar utama dan gambar lain
                    </h3>
                    <button type="button"
                        class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="space-y-6 p-6">
                    <div class="md:col-span-4">
                        <div class="grid grid-cols-2">
                            @if ($barang->cloud_img != '')
                                <div class="mx-auto max-w-screen-xxs justify-center rounded-lg">
                                    Gambar utama
                                    <img src="{{ $barang->img_urls }}" class="mx-auto mb-2 h-auto w-[200px]">
                                    <button type="button" data-modal-toggle="popup-modal"
                                        class="mx-auto flex items-center rounded-lg bg-red-600 p-2 text-center text-sm text-white hover:bg-red-700">Hapus
                                        Gambar</button>
                                </div>
                            @else
                                <b class="text-center">Tidak ada gambar utama</b>
                            @endif
                            <div class="mx-auto grid grid-cols-1 justify-center gap-6">
                                <b class="text-center">Gambar Lain</b>
                                @if (count($gambar) > 0)
                                    @foreach ($gambar as $g)
                                        <div class="max-w-screen-xxs rounded-lg">
                                            <img src="{{ $g->img_urls }}" alt=""
                                                class="mx-auto h-auto w-[200px]">
                                            <button type="button" data-modal-toggle="gambar-modal{{ $barang->barcode }}"
                                                class="mx-auto flex items-center rounded-lg bg-red-600 p-2 text-center text-sm text-white hover:bg-red-700">Hapus
                                                Gambar</button>
                                        </div>
                                    @endforeach
                                @else
                                    <b class="text-center">Tidak ada gambar lain</b>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                    <button data-modal-toggle="defaultModal" type="button"
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
    </div>


    <div id="popup-modal" tabindex="-1"
        class="fixed top-0 right-0 left-0 z-50 hidden h-modal overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
        <div class="relative h-full w-full max-w-xs p-4 md:h-auto">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-modal">
                    <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-3 text-center">
                    <form action="/deletecover/{{ $barang->barcode }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <svg aria-hidden="true" class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin menghapus gambar
                            utama?</h3>
                        <button data-modal-toggle="popup-modal" type="submit"
                            class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                            Ok
                        </button>
                        <button data-modal-toggle="popup-modal" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">No,
                            cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($gambar as $g)
        <div id="gambar-modal{{ $g->barcode }}" tabindex="-1"
            class="fixed top-0 right-0 left-0 z-50 hidden h-modal overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-xs p-4 md:h-auto">
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-toggle="gambar-modal{{ $g->barcode }}">
                        <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-3 text-center">
                        <form action="/deletegambar/{{ $g->kdGambar }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('delete')
                            <svg aria-hidden="true" class="mx-auto mb-4 h-14 w-14 text-gray-400 dark:text-gray-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin menghapus
                                gambar {{ $g->cloud_img }}
                                ?</h3>
                            <button data-modal-toggle="gambar-modal{{ $g->barcode }}" type="submit"
                                class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                Ok
                            </button>
                            <button data-modal-toggle="gambar-modal{{ $g->barcode }}" type="button"
                                class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">No,
                                cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- jQuery Script --}}
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
    </script>
@endsection
