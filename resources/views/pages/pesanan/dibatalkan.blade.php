@extends('layouts.layout-main')
@section('content')
    @include('pages.pesanan.navtab')

    @if ($brgBatal->count() == 0)
        <h1 class="m-5 text-center text-red-700">
            Tidak ada barang yang dibatalkan
        </h1>
    @else
        {{-- diproses status 0 --}}

        {{-- form checkout --}}

        {{-- produk --}}
        <a href="/pesanan/detail/{{ $noFaktur }}">

            <div class="container mt-3 rounded-lg border-t-4 bg-white py-5 shadow-lg">
                <div class="m-3">

                    <div class="text-red-700"><i class="fa fa-box"></i> Produk dipesan</div>




                    <div class="mt-2 grid grid-cols-1">
                        <div class="container">
                            <div class="relative overflow-x-auto sm:rounded-lg">
                                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                Gambar
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Product
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Qty
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Price
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                SubTotal
                                            </th>
                                            <th scope="col" class="py-3 px-6">
                                                Status pemesanan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brgBatal as $key => $b)
                                            <form action="{{ route('order.update', [$b->id]) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="hidden" value="{{ $b->id }}" name="id[]"
                                                    id="id[]">
                                                <input type="hidden" name="noFaktur" id="noFaktur"
                                                    value="{{ $noFaktur }}">
                                                <tr
                                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                                    {{-- <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{ $key + 1 }}
                                                    </td> --}}
                                                    <td class="w-32 p-4">
                                                        {{-- @if ($b->barang->img_urls == null or $b->barang->img_urls == '')
                                                            <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                                                alt="Apple Watch" class="h-8 w-8">
                                                        @else --}}
                                                        <img src="{{ $b->barang->img_urls ?? '' }}"
                                                            alt="{{ $b->namaBarang }}" class="h-8 w-8">
                                                        {{-- @endif --}}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{ $b->namaBarang }}
                                                    </td>
                                                    <td class="mx-auto items-center justify-between py-4 px-6">
                                                        {{ $b->qty }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        Rp. {{ number_format($b->hrgJual, 0, ',', '.') }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        Rp. {{ number_format($b->qty * $b->hrgJual, 0, ',', '.') }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        @if ($b->status == 0)
                                                            <b>Sedang diproses</b>
                                                        @elseif ($b->status == 1)
                                                            <b>Sedang dikemas</b>
                                                        @elseif ($b->status == 2)
                                                            <b>Sedang dikirim</b>
                                                        @elseif ($b->status == 3)
                                                            <b>Sudah sampai</b>
                                                        @else
                                                            <b>Barang dibatalkan</b>
                                                        @endif
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold">
                                                        <a href="/pesanan/detail/{{ $b->noFaktur }}"
                                                            class="rounded-md bg-green-500 p-2 text-white hover:bg-green-700">Detail</a>
                                                    </td>
                                                </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        {{-- @endforeach --}}
    @endif
@endsection
