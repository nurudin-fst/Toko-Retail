@extends('admin.layouts.template')
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="m-5">
            <table class="w-full bg-[#bb1724] text-left text-sm text-white" id="table-datatables">
                <thead class="bg-[#bb1724] text-xs uppercase text-white dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="py-2 px-6">
                            #
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Gambar
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Nama Produk / barcode
                        </th>
                        <th scope="col" class="py-2 px-6 text-center">
                            Harga beli
                        </th>
                        <th scope="col" class="py-2 px-6 text-center">
                            Harga jual
                        </th>
                        <th scope="col" class="py-2 px-6 text-center">
                            Stok toko
                        </th>
                        <th scope="col" class="py-2 px-6 text-center">
                            Stok gudang
                        </th>
                        {{-- <th scope="col" class="py-2 px-6 text-center">
                            Kategori
                        </th> --}}
                        <th scope="col" class="py-2 px-7 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr class="border-b bg-white text-black hover:bg-gray-50">
                            <th class="py-2 px-6 text-center">
                                {{ $key + 1 }}
                            </th>
                            <td class="items-center py-3 px-6 dark:text-white">
                                @if ($product->img_urls == null or $product->img_urls == '-')
                                    <img class="h-10 w-10"
                                        src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                        alt="Produk">
                                @else
                                    <img class="h-10 w-10" src="{{ $product->img_urls }}" alt="Produk">
                                @endif
                            </td>
                            <td scope="row"
                                class="flex max-w-sm items-center whitespace-nowrap py-2 px-6 text-gray-900 dark:text-white">
                                <div class="pl-3">
                                    <div class="text-base font-semibold text-black">{{ ucfirst($product->namaBarang) }}
                                    </div>
                                    <div class="block font-normal text-black">{{ $product->barcode }}</div>
                                </div>
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ number_format($product->hrgBeli, 0, ',', '.') }}
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ number_format($product->hrgJual, 0, ',', '.') }}
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ $product->stok }}
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ $product->stok_gudang }}
                            </td>
                            {{-- <td class="py-2 px-6 text-center">
                                {{ $product->kategori->namaKategori ?? '' }}
                            </td> --}}

                            <td class="inline-flex text-center">
                                <a href="{{ route('storage.edit', [$product->barcode]) }}" type="submit"
                                    class="mr-1 rounded-lg border border-blue-600 bg-white p-1 text-sm text-blue-600 hover:bg-blue-600 hover:text-white">Tambah
                                    Stok Gudang</a>
                                <a href="{{ route('storage.show', [$product->barcode]) }}" type="submit"
                                    class="ml-1 rounded-lg border border-blue-600 bg-white p-1 text-sm text-blue-600 hover:bg-blue-600 hover:text-white">Tambah
                                    Stok Toko</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
