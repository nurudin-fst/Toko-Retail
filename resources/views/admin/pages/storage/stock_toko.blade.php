@extends('admin.layouts.template')
@section('content')
    @if (session()->has('error'))
        <div class="mb-4 flex rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-200 dark:text-red-800"
            role="alert">
            <svg aria-hidden="true" class="mr-3 inline h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="grid grid-cols-1 items-center gap-8 rounded-lg border bg-white p-8 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <main id="gallery">
                    <div id="main-image">
                        @if ($product->cloud_Img == null or $product->cloud_img == '-')
                            <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                alt="Image"
                                class="mt-2 h-[314px] max-w-full rounded-md border border-gray-300 bg-gray-50 object-contain p-1">
                        @else
                            <img src="{{ $product->img_urls }}" alt="Image"
                                class="mt-2 h-[314px] max-w-full rounded-md border border-gray-300 bg-gray-50 object-contain p-1">
                        @endif
                    </div>
                    <div id="images" class="mt-3 grid grid-cols-4 gap-x-4">
                        @if ($product->cloud_Img == null or $product->cloud_img == '-')
                            <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                alt="Image"
                                class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-gray-50 p-1">
                        @else
                            <img src="{{ $product->img_urls }}" alt="Image"
                                class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-gray-50 p-1">
                        @endif
                        @foreach ($images as $images)
                            <img src="{{ $images->img_urls ?? '' }}" alt="Image"
                                class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-white p-1">
                        @endforeach
                    </div>
                    <script>
                        let images = document.querySelectorAll("#gallery > #images > img");
                        images.forEach((image) =>
                            image.addEventListener("click", function() {
                                let imagesSrc = image.getAttribute("src");
                                document.querySelector("#gallery > #main-image > img").setAttribute("src", imagesSrc);
                            })
                        );
                    </script>
                </main>
            </div>
            <div class="lg:col-span-4">
                <div class="mt-7 p-1 lg:mt-0 lg:p-0 lg:pl-5">
                    <h2 class="mb-3 text-xl font-semibold uppercase tracking-wide text-gray-600">
                        {{ $product->namaBarang }}
                    </h2>
                    <p class="mb-2 text-sm text-slate-600">
                        {{ $product->kategori->namaKategori ?? '' }}
                    </p>
                    <h3 class="mb-2 text-xl font-semibold text-red-800">Rp.{{ number_format(600000, 0, ',', '.') }}</h3>
                    <p class="text-sm font-bold text-slate-600">
                        Stok Gudang: <span>{{ $product->stok_gudang }}</span>
                    </p>
                    <p class="text-sm font-bold text-slate-600">
                        Stok Toko: <span>{{ $product->stok }}</span>
                    </p>
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="mt-7 p-1 lg:mt-0 lg:p-0 lg:pl-5">
                    <h1 class="text-2xl">Tambah stok ke Toko:</h1>
                    <form action="{{ route('storage.update', [$product->barcode]) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="number" min="1" name="stock_toko" placeholder="Jumlah ?"
                            class="w-full rounded-lg border p-2">
                        <button type="submit" class="mt-3 rounded-lg bg-blue-500 p-2 text-white hover:bg-blue-600"><i
                                class="fa fa-plus"></i> Tambah ke
                            Toko</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-7 grid grid-cols-1 rounded-lg border bg-white p-4 lg:p-8">
            <div>
                <h4 class="mb-3 text-base font-medium">Bahan Pembuat:</h4>
                <div class="relative overflow-x-auto">
                    <div class="w-full table-auto text-left text-sm text-gray-700">
                        {{ $product->deskripsi }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
