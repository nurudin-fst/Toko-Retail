<div class="grid grid-flow-row grid-cols-2 gap-2 xs:gap-4 sm:gap-6 md:grid-cols-4 lg:gap-4">
    @foreach ($products as $product)
        <div class="mb-2 h-full w-full overflow-hidden rounded bg-white p-2 shadow-md">
            <a href="/products/{{ $product->slug }}" class="relative overflow-hidden">
                @if ($product->cloud_img == '' or $product->cloud_img == null)
                    <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                        alt="Image" class="h-auto max-w-full rounded-md border border-gray-300 bg-white p-1">
                @else
                    <img src="{{ $product->img_urls }}" alt="Image"
                        class="h-auto max-w-full rounded-md border border-gray-300 bg-white p-1">
                @endif
            </a>
            <div class="p-2">
                <span class="text-xs text-slate-600">{{ $product->kategori->namaKategori ?? '' }}</span>
                <a href="/products/{{ $product->slug }}">
                    <h5 class="text-sm font-medium uppercase tracking-tight hover:text-red-800">
                        {{ $product->namaBarang }}
                    </h5>
                </a>
                <div class="mt-1">
                    <span class="inline-block text-lg font-semibold text-red-800">Rp.
                        {{ number_format($product->hrgJual, 0, ',', '.') }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="mx-10 mt-4 sm:mx-7">
    {!! $products->onEachSide(1)->links() !!}
</div>
