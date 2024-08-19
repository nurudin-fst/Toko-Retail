@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="grid grid-cols-1 items-center gap-8 rounded-lg border bg-white p-8 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <main id="gallery">
                    <div id="main-image">
                        <img src="{{ $product->img_urls }}" alt="Image"
                            class="mt-2 h-[314px] max-w-full rounded-md border border-gray-300 bg-gray-50 object-contain p-1">
                    </div>
                    <div id="images" class="mt-3 grid grid-cols-4 gap-x-4">
                        <img src="{{ $product->img_urls }}" alt="Image"
                            class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-gray-50 p-1">
                        {{-- <img src="/assets/img/roma-wafello-chocoblast-belakang.jpg" alt="Image"
                            class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-white p-1">
                        <img src="{{ $product->img_Urls }}" class="img" alt="#"> --}}
                        @foreach ($images as $images)
                            <img src="{{ $images->img_urls }}" alt="Image"
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
                    <p class="mb-3 text-sm text-slate-600">
                        {{ $product->kategori->namaKategori }}
                    </p>
                    <h3 class="mb-3 text-xl font-semibold text-red-800">Rp.{{ number_format(600000, 0, ',', '.') }}</h3>
                    <p class="mb-3 text-sm text-slate-600">
                        Stok Gudang: <span>{{ $product->stok_gudang }}</span>
                    </p>
                    <p class="mb-3 text-sm text-slate-600">
                        Stok Toko: <span>{{ $product->stok }}</span>
                    </p>
                    <p class="mb-3 text-sm text-slate-600">
                        Berat: <span>{{ $product->berat }}</span>
                    </p>
                    <p class="mb-3 text-sm text-slate-600">
                        {{-- Suplier: <span>{{ $product->supplier->namaSupplier }}</span> --}}
                    </p>
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="mt-7 p-1 lg:mt-0 lg:p-0 lg:pl-5">
                    <h1 class="text-2xl">Bahan Pembuat:</h1>
                    <p>{{ $product->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
