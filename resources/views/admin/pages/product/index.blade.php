@extends('admin.layouts.template')
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="m-5">
            <table class="w-full rounded-lg bg-[#bb1724] text-left text-sm text-white" id="table-datatables">
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
                        </th>
                        <th scope="col" class="py-2 px-6 text-center">
                            Satuan
                        </th> --}}
                        <th scope="col" class="py-2 px-6 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $key => $product)
                        <tr class="md:boder-b border-b bg-white text-black hover:bg-gray-100">
                            <th class="m-auto w-auto border text-center">
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
                                    <div class="text-base font-semibold text-black">
                                        {{ ucfirst($product->namaBarang) }}
                                    </div>
                                    <div class="block font-normal text-black">{{ $product->barcode }}</div>
                                </div>
                            </td>
                            <td class="text-center">
                                {{ number_format($product->hrgBeli, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                {{ number_format($product->hrgJual, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                {{ $product->stok }}
                            </td>
                            <td class="text-center">
                                {{ $product->stok_gudang }}
                            </td>
                            {{-- <td class="text-center">
                                {{ $product->kategori->namaKategori ?? '' }}
                            </td>
                            <td class="text-center">
                                {{ $product->satuan->namaSatuan }}
                            </td> --}}
                            <td class="flex items-center py-2 px-1 text-left">
                                <a href="{{ route('products.show', [$product->barcode]) }}"
                                    class="mx-2 w-full rounded-lg bg-blue-700 p-2 text-sm font-bold text-white hover:bg-blue-800">Detail</a>
                                <a href="{{ route('products.edit', [$product->barcode]) }}"
                                    class="mx-2 w-full rounded-lg bg-yellow-300 p-2 text-sm font-bold text-black hover:bg-yellow-400">Edit</a>
                                <form action="{{ route('products.destroy', [$product->barcode]) }}" method="post"
                                    class="mr-3">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Yakin dihapus?')"
                                        class="mx-2 w-full rounded-lg bg-red-600 p-2 text-sm text-white hover:bg-red-700">
                                        Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- jQuery Script --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    {{-- <script>
        $(document).ready(function() {
            tampildata();
            $('#table-datatables').DataTable({

            });
        });

        function tampildata() {
            $('tbody').html('');
            $.ajax({
                url: "{{ route('dataBarang') }}",
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(key, item) {
                        // console.log(data);
                        $('tbody').append(
                            '<tr class="border-b bg-white text-black hover:bg-gray-50">\
                                                                                                  <td class="items-center py-3 px-6 dark:text-white">' +
                            parseInt(
                                key +
                                1) +
                            '</td>\
                                                                            <td><img class="h-10 w-10" src="' + item
                            .img_urls +
                            '" alt="Produk"></td>\
                                                                                                <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .namaBarang +
                            '</td>\
                                                                                                  <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .hrgBeli +
                            '</td>\
                                                                                                <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .hrgJual +
                            '</td>\
                                                                                                <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .stok +
                            '</td>\
                                                                                                <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .stok_gudang +
                            '</td>\
                                                                                                <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .namaKategori +
                            '</td>\
                                                                                                <td class="items-center py-3 px-6 dark:text-white">' +
                            item
                            .namaSatuan +
                            '</td>\
                                                                                                <td class="md:px-auto flex items-center py-2 px-1 text-center">\
                                                                                                  <a href="/dashboard/products/' +
                            item
                            .barcode +
                            '" class="mx-3 w-full rounded-lg bg-blue-700 p-2 text-sm font-bold text-white hover:bg-blue-800">Detail</a>\
                                                                                                  <a href="/dashboard/products/' +
                            item
                            .barcode +
                            '/edit" class="mx-3 w-full rounded-lg bg-yellow-300 p-2 text-sm font-bold text-black hover:bg-yellow-400">Edit</a>\
                                                                                                </td>\ </tr>')
                    })
                }
            })
        }
    </script> --}}
@endsection
