@extends('layouts.layout-main')
@section('content')
    {{-- alamat pengirim --}}
    <div class="container rounded-lg border-t-4 bg-white py-5 shadow-lg">
        <div class="m-3">

            <div class="text-red-700"><i class="fa fa-location-dot"></i> Alamat Pengiriman</div>

            <div class="mt-2 grid grid-cols-1 md:grid-cols-2">
                <div>{{ auth()->user()->namaUser }} ({{ auth()->user()->noHp }}) </div>
                <div>{{ $data->alamat }}</div>
            </div>


        </div>
    </div>

    {{-- form checkout --}}

    {{-- produk --}}
    <div class="container mt-3 rounded-lg border-t-4 bg-white py-5 shadow-lg">
        <div class="m-3">

            <div class="text-red-700"><i class="fa fa-box"></i> Produk dipesan</div>

            <div class="mt-2 grid grid-cols-1">
                <div class="container">
                    <div class="relative overflow-x-auto sm:rounded-lg">
                        <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        #
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Image
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
                                        Status pengiriman
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Alasan pembatalan
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
                                                    alt="Apple Watch" class="h-10 w-10">
                                            @else
                                                <img src="{{ $b->barang->img_urls ?? '' }}" alt="{{ $b->namaBarang }}"
                                                    class="h-10 w-10">
                                            @endif
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
                                        <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                            @if ($b->status == 4)
                                                {{ $b->alasanPembatalan }}
                                            @else
                                                -
                                            @endif
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

    {{-- total bayar --}}
    <div class="container mt-3 rounded-lg border-t-4 bg-white py-5 shadow-lg">
        <div class="m-3">

            <div class="text-center">
                <div class="mt-4 text-sm text-red-700"><i class="fa-regular fa-money-bill"></i> Metode bayar hanya Cash
                    on
                    delivery /
                    bayar
                    ditempat
                    khusus
                    wilayah
                    purbalingga!</div>
                {{-- <div class="mt-4 bg-red-700 text-sm text-white">Pemesanan di online shop ini khusus wilayah
                  kabupaten
                  purbalingga!</div> --}}
            </div>

            <div class="mt-4 text-right">
                <span class="mt-4">Subtotal produk: Rp. <span
                        class="text-red-700">{{ number_format($data->subtotal, 0, ',', '.') }}</span></span><br>
                <span class="mt-4">Total pembayaran: Rp. <span
                        class="text-red-700">{{ number_format($data->subtotal, 0, ',', '.') }}</span></span><br>
            </div>

        </div>
    </div>
@endsection
