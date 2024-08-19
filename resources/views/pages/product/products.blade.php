@extends('layouts.layout-main')
@section('content')
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-12 lg:gap-8">
            <div class="col-span-3">
                <div class="mb-3 rounded border border-gray-200 bg-white p-7">
                    <div class="mb-6 border-b border-gray-300 pb-3 text-sm font-medium">Cari Produk</div>
                    <form method="GET" class="space-y-4">
                        <div>
                            <label for="kategori"
                                class="mb-2 block text-sm font-medium text-gray-900 dark:text-gray-400">Pilih
                                Kategori</label>
                            <select id="kategori" name="category"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-red-500 focus:ring-red-500">
                                <option value="all" selected="">Semua</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <input type="search" name="search" id="product"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-[#c51826] focus:ring-[#c51826]"
                                placeholder="Cari produk..." autocomplete="off">
                        </div>
                        <div>
                            <button type="submit"
                                class="w-full rounded-lg border border-[#bb1724] bg-[#bb1724] p-2.5 text-sm font-medium text-white hover:bg-[#ac1521] focus:outline-none focus:ring-4 focus:ring-red-300">
                                Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-span-9">
                <div class="rounded border border-gray-200 bg-white px-5 py-4 sm:flex sm:items-center sm:justify-center">
                    <div class="mt-3 inline-block sm:mt-0">
                        <div class="text-sm font-light">
                            Menampilkan {{ $products->firstItem() }} - {{ $products->lastItem() }} produk dari total
                            {{ $products->total() }}
                        </div>
                    </div>
                </div>

                <div id="products-grid" class="py-3">
                    @include('pages.product.products-grid')
                </div>
            </div>
        </div>
    </div>
@endsection
