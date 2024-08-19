@extends('layouts.layout-main')
@section('content')
    @if ($brg->count() == '')
        <div class="mx-auto mt-7">
            <div class="mb-4 flex justify-center rounded-lg bg-blue-100 p-4 text-sm text-blue-700 dark:bg-blue-200 dark:text-blue-800"
                role="alert">
                <svg aria-hidden="true" class="mr-3 inline h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Belum ada barang yang ditambah ke keranjang!</span>
                    <a href="/products"
                        class="hidden rounded-lg bg-blue-600 p-1 text-white hover:bg-blue-800 md:p-2">Belanja <i
                            class="fa fa-circle-right"></i></a>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Gambar
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama Produk
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Jumlah
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harga
                            </th>
                            <th scope="col" class="py-3 px-6">
                                SubTotal
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brg as $key => $b)
                            <tr
                                class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                    {{ $key + 1 }}
                                </td>
                                <td class="w-32 p-4">
                                    @if ($b->barang->img_urls == null)
                                        <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                            alt="Apple Watch" class="h-8 w-8">
                                    @else
                                        <img src="{{ $b->barang->img_urls }}" alt="Apple Watch" class="h-8 w-8">
                                    @endif
                                </td>
                                <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                    {{ $b->namaBarang }}
                                </td>
                                <form action="/dataCart/{{ $b->id }}" method="GET">
                                    <td class="mx-auto items-center justify-between py-4 px-6">
                                        <div class="text-center">
                                            <input type="number" id="qty"
                                                class="block w-14 rounded-lg border border-gray-300 bg-gray-50 px-2.5 py-1 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                placeholder="1" required="" min="1" value="{{ $b->qty }}"
                                                name="qty">
                                            {{-- {{ $b->qty }} --}}
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        Rp. {{ number_format($b->hrgJual, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        Rp. {{ number_format($b->qty * $b->hrgJual, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-6">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" value="{{ $b->id }}" name="id" id="id">
                                        <button type="submit"
                                            class="rounded-lg bg-yellow-300 p-2 font-medium text-black dark:text-black">Update
                                            Cart
                                        </button>
                                </form>
                                </td>
                                <td class="py-4 px-6">
                                    <form action="{{ route('keranjang.destroy', $b->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="rounded-lg bg-red-600 p-2 font-medium text-white dark:text-white"
                                            onclick="return confirm('Yakin barang dihapus')"><i class="fa fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="m-5 text-center">
            {{-- Total pembelian: Rp. {{ number_format($brg->sum('subtotal'), 0, ',', '.') }} --}}
            <div class="container my-4 mx-auto items-center justify-center justify-items-end text-right">
                <a href="/checkout" class="rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800 md:p-3">Checkout</a>
                <a href="/products" class="rounded-lg bg-green-500 p-2 text-white hover:bg-green-700 md:p-3">Belanja lagi
                    <i class="fa fa-circle-right"></i></a>
            </div>
        </div>
    @endif

    <script>
        $(document).ready(function() {

            $(document).on("input", '#qty', function(e) {
                e.preventDefault();
                var qty = {
                    'qty': $('#qty').val(),
                }
                $.ajax({
                    type: "GET",
                    url: "/dataCart/{id}",
                    data: qty,
                    dataType: "json",
                    success: function(response) {
                        window.location.reload();
                    }
                })
            })


        }) //end document ready
    </script>
@endsection
