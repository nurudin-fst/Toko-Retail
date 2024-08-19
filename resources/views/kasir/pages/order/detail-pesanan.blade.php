@extends('kasir.layouts.template')
@section('content')

    @if ($data->count() == 0)
        <h1 class="m-5 text-center text-red-700">
            <a href="/orders" class="bg-gray-600 text-white hover:bg-gray-800">Kembali</a>
        </h1>
    @else
        <h1 class="text-center text-3xl">Detail pesanan {{ $data->noFaktur }}</h1>
        <div class="mx-auto mt-2 h-[2px] w-[100px] bg-black"></div>

        {{-- alamat pengirim --}}
        <div class="container rounded-lg border-t-4 bg-white py-5 shadow-lg">
            <div class="m-3">

                <div class="text-red-700"><i class="fa fa-location-dot"></i> Alamat Pengiriman</div>

                <div class="mt-2 grid grid-cols-1 md:grid-cols-2">
                    <div>{{ $data->user->namaUser }} ({{ $data->user->noHp }}) </div>
                    <div>
                        {{ $data->alamat }}
                    </div>
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
                                <thead
                                    class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
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
                                                @if ($b->barang->img_urls == null or $b->barang->img_urls == '')
                                                    <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663833101/products/produk_fwzfro.jpg"
                                                        alt="Apple Watch" class="h-8 w-8">
                                                @else
                                                    <img src="{{ $b->barang->img_urls }}" alt="Apple Watch" class="h-8 w-8">
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
                                                    <button type="button" data-modal-toggle="batal/{{ $b->id }}"
                                                        class="mx-2 rounded-lg bg-red-600 p-2 text-white hover:bg-red-800">Batalkan</button>
                                                @elseif ($b->status == 1)
                                                    <b>Barang sedang dikemas</b>
                                                @elseif ($b->status == 2)
                                                    <b>Barang sedang dikirim</b>
                                                @elseif ($b->status == 3)
                                                    {{-- <b>Barang sudah sampai</b> --}}
                                                    <b>Pesanan disetujui</b>
                                                @elseif ($b->status == 4)
                                                    Barang sudah dibatalkan
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
                    <div class="mt-4 text-sm text-red-700"><i class="fa-regular fa-money-bill"></i> Metode bayar hanya
                        Cash on delivery / bayar
                        ditempat
                        khusus
                        wilayah
                        purbalingga!</div>
                </div>

                <div class="mt-4 text-right">
                    <span class="mt-4">Total pembayaran: Rp. <span
                            class="text-red-700">{{ number_format($data->subtotal, 0, ',', '.') }}</span></span><br>

                    <div class="flex justify-end">
                        {{-- button setuju pemesanan --}}

                        @if ($data->status == 0)
                            {{-- <form action="{{ route('rinci.update', [$data->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" name="id" id="id">
                                <input type="hidden" value="1" name="status" id="status">
                                <input type="hidden" value="{{ $data->noFaktur }}" name="noFaktur" id="noFaktur">
                                <button type="submit"
                                    class="mx-2 rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800">Setuju</button>
                            </form> --}}
                            <form action="{{ route('rinci.update', [$b->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" value="{{ $b->id }}" name="id" id="id">
                                <input type="hidden" value="3" name="status" id="status">
                                <input type="hidden" value="{{ $b->noFaktur }}" name="noFaktur" id="noFaktur">
                                @foreach ($brgKirimb as $bk)
                                    <input type="hidden" value="{{ $bk->barcode }}" name="barcode" id="barcode">
                                    <input type="hidden" value="{{ $bk->namaBarang }}" name="namaBarang" id="namaBarang">
                                    <input type="hidden" value="{{ $bk->hrgJual }}" name="hrgJual" id="hrgJual">
                                    <input type="hidden" value="{{ $bk->qty }}" name="jmlhJual" id="jmlhJual">
                                    <input type="hidden" value="{{ $bk->barang->hrgBeli }}" name="hrgBeli" id="hrgBeli">
                                @endforeach

                                <button type="submit"
                                    class="mx-2 rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800">Setuju</button>
                            </form>
                        @elseif ($data->status == 1)
                            <form action="{{ route('rinci.update', [$data->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" value="{{ $data->id }}" name="id" id="id">
                                <input type="hidden" value="2" name="status" id="status">
                                <input type="hidden" value="{{ $data->noFaktur }}" name="noFaktur" id="noFaktur">
                                <button type="submit"
                                    class="mx-2 rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800">Setuju</button>
                            </form>
                        @elseif ($data->status == 2)
                            <form action="{{ route('rinci.update', [$b->id]) }}" method="POST">
                                @method('put')
                                @csrf
                                <input type="hidden" value="{{ $b->id }}" name="id" id="id">
                                <input type="hidden" value="3" name="status" id="status">
                                <input type="hidden" value="{{ $b->noFaktur }}" name="noFaktur" id="noFaktur">
                                @foreach ($brgKirimb as $bk)
                                    <input type="hidden" value="{{ $bk->barcode }}" name="barcode" id="barcode">
                                    <input type="hidden" value="{{ $bk->namaBarang }}" name="namaBarang"
                                        id="namaBarang">
                                    <input type="hidden" value="{{ $bk->hrgJual }}" name="hrgJual" id="hrgJual">
                                    <input type="hidden" value="{{ $bk->qty }}" name="jmlhJual" id="jmlhJual">
                                    <input type="hidden" value="{{ $bk->barang->hrgBeli }}" name="hrgBeli"
                                        id="hrgBeli">
                                @endforeach

                                <button type="submit"
                                    class="mx-2 rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800">Setuju</button>
                            </form>
                        @endif

                        {{-- button kembali sesuai status --}}
                        @if ($data->status == 0)
                            <a href="/orders" class="rounded-lg bg-gray-700 p-2 text-white hover:bg-gray-800">Kembali</a>
                        @elseif ($data->status == 1)
                            <a href="/orders/dikemas"
                                class="rounded-lg bg-gray-700 p-2 text-white hover:bg-gray-800">Kembali</a>
                        @elseif ($data->status == 2)
                            <a href="/orders/dikirim"
                                class="rounded-lg bg-gray-700 p-2 text-white hover:bg-gray-800">Kembali</a>
                        @elseif ($data->status == 3)
                            <a href="/showPrint/{{ $data->noFaktur }}"
                                class="mr-2 rounded-lg bg-green-500 p-2 text-white hover:bg-green-800"><i
                                    class="fa fa-print"></i>
                                Print</a>
                            <a href="/orders/selesai"
                                class="rounded-lg bg-gray-700 p-2 text-white hover:bg-gray-800">Kembali</a>
                        @elseif ($data->status == 4)
                            <a href="/orders/dibatalkan"
                                class="rounded-lg bg-gray-700 p-2 text-white hover:bg-gray-800">Kembali</a>
                        @endif

                    </div>
                </div>

            </div>
        </div>

        </form>
    @endif


    <!-- Main modal pembatalan -->

    @foreach ($brg as $b)
        <div id="batal/{{ $b->id }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 right-0 left-0 z-50 hidden h-modal w-full overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-2xl p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Batalkan pesanan
                        </h3>
                        <button type="button"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="batal/{{ $b->id }}">
                            <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="space-y-6 p-6">
                        <form action="{{ route('rinci.update', [$b->id]) }}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" id="id" value="{{ $b->id }}">
                            <input type="hidden" name="status" id="status" value="4">
                            <input type="hidden" name="noFaktur" id="noFaktur" value="{{ $b->noFaktur }}">
                            <textarea name="alasanPembatalan" id="alasanPembatalan" class="w-full" cols="15" required></textarea>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                        <button type="submit"
                            class="mx-2 rounded-lg bg-red-600 p-2 text-white hover:bg-red-800">Batalkan</button>
                        {{-- <button data-modal-toggle="batal/{{ $b->id }}" type="button"
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button> --}}
                        <button data-modal-toggle="batal/{{ $b->id }}" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
