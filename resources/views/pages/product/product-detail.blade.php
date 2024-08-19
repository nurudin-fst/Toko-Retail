@extends('layouts.layout-main')
@section('content')
    <div class="container">
        <div class="rounded-lg border bg-white p-4 lg:p-8">
            <div class="grid grid-cols-1 items-center gap-2 md:grid-cols-12 md:gap-4 lg:grid-cols-12 lg:gap-6">
                <div class="md:col-span-5 lg:col-span-5">
                    <main id="gallery">
                        <div id="main-image">
                            @if ($product->cloud_img == null or $product->cloud_img == '-')
                                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                    alt="Image"
                                    class="mt-2 h-[314px] max-w-full rounded-md border border-gray-300 bg-gray-50 object-contain p-1">
                            @else
                                <img src="{{ $product->img_urls }}" alt="Image"
                                    class="mt-2 h-[314px] max-w-full rounded-md border border-gray-300 bg-gray-50 object-contain p-1">
                            @endif
                        </div>
                        <div id="images" class="mt-3 grid grid-cols-4 gap-x-4">
                            @if ($product->cloud_img == null or $product->cloud_img == '-')
                                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                    alt="Image"
                                    class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-gray-50 p-1">
                            @else
                                <img src="{{ $product->img_urls }}" alt="Image"
                                    class="mt-2 h-auto max-w-full rounded-md border border-gray-300 bg-gray-50 p-1">
                            @endif
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

                <div class="md:col-span-7 lg:col-span-7 lg:mb-40">
                    <div class="mt-7 p-1 lg:mt-0 lg:p-0 lg:pl-5">
                        <form action="{{ route('keranjang.store') }}" method="post" class="w-full">
                            @csrf
                            {{-- inputan hidden cart --}}
                            <input type="hidden" name="barcode" id="barcode" value="{{ $product->barcode }}">
                            <input type="hidden" name="namaBarang" id="namaBarang" value="{{ $product->namaBarang }}">
                            <input type="hidden" name="hrgJual" id="hrgJual" value="{{ $product->hrgJual }}">
                            <input type="hidden" name="status" id="status" value="0">
                            <input type="hidden" name="kdUser" id="kdUser" value="{{ auth()->user()->kdUser ?? '' }}">
                            <input type="hidden" name="subtotal" id="subtotal"
                                value="{{ request('qty') * $product->hrgJual }}">

                            {{-- stok --}}
                            <input type="hidden" name="stok" id="stok" value="{{ $product->stok }}">
                            <h2 class="mb-3 text-xl font-semibold uppercase tracking-wide text-gray-600">
                                {{ $product->namaBarang }}
                            </h2>
                            <p class="mb-3 text-sm text-slate-600">
                                {{ $product->kategori->namaKategori }}
                            </p>
                            <h3 class="mb-3 text-xl font-semibold text-red-800">
                                Rp.{{ number_format($product->hrgJual, 0, ',', '.') }}</h3>
                            {{-- <p class="mb-3 text-sm text-slate-600">
                                Stok : <span>{{ $product->stok }}</span>
                            </p> --}}
                            <div class="mb-3 grid grid-cols-4 gap-2 text-sm text-slate-600">
                                <div class="flex">
                                    <input type="number" min="1" value="1" name="qty" id="qty"
                                        class="w-[100px] text-center">
                                    <button
                                        class="ml-2 flex w-auto rounded-lg bg-blue-600 text-sm text-white hover:bg-blue-700">
                                        <b class="mx-3" id="addCart">Add <i class="fa-solid fa-cart-shopping"></i></b>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-7 grid grid-cols-1 rounded-lg border bg-white p-4 lg:p-8">
            <div>
                <h4 class="mb-3 text-base font-medium">Informasi Produk</h4>
                <div class="my-4">
                    {{-- <h1 class="text-2xl text-center">Bahan pembuat</h1> --}}
                    <p>{{ $product->deskripsi }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
