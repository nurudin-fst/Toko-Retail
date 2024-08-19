@extends('admin.layouts.template')
@section('content')
    <div class="container">
        <div class="grid grid-cols-1 items-center gap-8 rounded-lg border bg-white p-8 lg:grid-cols-12">
            <div class="lg:col-span-4">
                <main id="gallery">
                    <div id="main-image">
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
                    <p class="mb-2 text-sm text-slate-600">
                        {{ $product->kategori->namaKategori }}
                    </p>
                    <h3 class="mb-2 text-xl font-semibold text-red-800">Rp.{{ number_format(600000, 0, ',', '.') }}</h3>
                    <p class="text-sm font-bold text-slate-600">
                        Stok Gudang: <span>{{ $product->stok_gudang }}</span>
                    </p>
                    <p class="text-sm font-bold text-slate-600">
                        Stok Toko: <span>{{ $product->stok }}</span>
                    </p>
                    <p class="text-sm text-slate-600">
                        Berat: <span>1000 gram</span>
                    </p>
                    <p class="text-sm text-slate-600">
                        Manufaktur: <span>PT. Mayora Indah TBK</span>
                    </p>
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="mt-7 p-1 lg:mt-0 lg:p-0 lg:pl-5">
                    <h1 class="text-2xl">Tambah stok ke Gudang:</h1>
                    <form action="{{ route('storage.update', [$product->barcode]) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="number" min="1" name="stock_gudang" placeholder="Jumlah ?"
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
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas minima quo, a enim eius repellendus
                        accusantium voluptate sequi provident reiciendis vel ducimus impedit placeat, nesciunt consequatur
                        voluptates quidem? Commodi, qui.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
