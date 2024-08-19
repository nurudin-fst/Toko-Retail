@extends('layouts.layout-main')
@section('content')
    <form action="{{ route('order.store') }}" method="post">
        @csrf
        <h1 class="text-center text-3xl">Checkout</h1>
        <div class="mx-auto mt-2 h-[2px] w-[100px] bg-black"></div>

        {{-- alamat pengirim --}}
        <div class="container rounded-lg border-t-4 bg-white py-5 shadow-lg">
            <div class="m-3">

                <div class="text-red-700"><i class="fa fa-location-dot"></i> Alamat Pengiriman</div>

                <div class="mt-2 grid grid-cols-1 md:grid-cols-2">
                    <div>{{ auth()->user()->namaUser }} ({{ auth()->user()->noHp }}) </div>
                    <div>
                        <textarea name="alamat" id="alamat" class="h-auto w-full" type="text">
                        {{ auth()->user()->kabupaten }}, {{ auth()->user()->kecamatan }}, {{ auth()->user()->desa }},
                    {{ auth()->user()->alamat_lengkap }}
                  </textarea>
                        <span class="text-red-600">Edit alamat di atas jika perlu</span>
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
                                        <input type="hidden" value="{{ $key + 1 }}" name="no[]" id="no[]">
                                        <input type="hidden" value="{{ $noFaktur }}" id="noFaktur" name="noFaktur[]">
                                        <input type="hidden" value="{{ $b->barcode }}" id="barcode" name="barcode[]">
                                        <input type="hidden" value="{{ $b->namaBarang }}" id="namaBarang"
                                            name="namaBarang[]">
                                        <input type="hidden" value="{{ $b->hrgJual }}" id="hrgJual" name="hrgJual[]">
                                        <input type="hidden" value="{{ $b->qty }}" id="qty" name="qty[]">
                                        <input type="hidden" value="0" id="status" name="status[]">
                                        <input type="hidden" value="0" id="statusBayar" name="statusBayar[]">
                                        <input type="hidden" value="{{ auth()->user()->kdUser }}" id="kdUser[]"
                                            name="kdUser[]">
                                        <input type="hidden" value="{{ $b->qty * $b->hrgJual }}" id="subtotal[]"
                                            name="subtotal[]">

                                        <input type="hidden" name="tgl_Jual[]" id="tgl_Jual" value="{{ $Tgl_Jual }}">

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
                                                    <img src="{{ $b->barang->img_urls }}" alt="Apple Watch"
                                                        class="h-8 w-8">
                                                @endif
                                            </td>
                                            <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                {{ $b->namaBarang }}
                                            </td>
                                            <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                {{ $b->qty }}
                                            </td>
                                            <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                Rp. {{ number_format($b->hrgJual, 0, ',', '.') }}
                                            </td>
                                            <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                Rp. {{ number_format($b->qty * $b->hrgJual, 0, ',', '.') }}
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
                    <span class="mt-4">Subtotal produk: Rp. <span
                            class="text-red-700">{{ number_format($total, 0, ',', '.') }}</span></span><br>

                    <span class="mt-4">Total pembayaran: Rp. <span
                            class="text-red-700">{{ number_format($total, 0, ',', '.') }}</span></span><br>

                    <a href="/cart" class="rounded-lg bg-gray-700 p-2 text-white hover:bg-gray-800 md:p-3">Batal
                        Checkout</a>
                    <button type="submit" id="pesan"
                        class="mt-3 rounded-lg bg-red-600 p-2 text-white hover:bg-red-800 md:p-3"
                        onclick="return confirm('barang yang sudah dipesan tidak dapat dibatalkan!')">Pesan</button>
                </div>

            </div>
        </div>

    </form>
@endsection

@push('script')
    <script>
        $(document).ready(function() {


            $(document).on("click", '#pesan', function(e) {
                e.preventDefault();

                var data = {
                    'noFaktur': $('#noFaktur').val(),
                    'barcode': $('#barcode').val(),
                    'namaBarang': $('#namaBarang').val(),
                    'hrgJual': $('#hrgJual').val(),
                    'qty': $('#qty').val(),
                    'subtotal': $('#subtotal').val(),
                    'status': $('#status').val(),
                    'statusBayar': $('#statusBayar').val(),
                    'kdUser': $('#kdUser').val(),
                }
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "/pesan",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        $('#success').html('');
                        $('#success').append(
                            '<div id="alert-3" class="mb-4 flex rounded-lg bg-green-100 p-4 dark:bg-green-200" role="alert">\
                                                                                                                                                                                                                                                                                                                                                                      <svg aria-hidden="true" class="h-5 w-5 flex-shrink-0 text-green-700 dark:text-green-800" fill="currentColor"\
                                                                                                                                                                                                                                                                                                                                                                          viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\
                                                                                                                                                                                                                                                                                                                                                                          <path fill-rule="evenodd"\
                                                                                                                                                                                                                                                                                                                                                                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"\
                                                                                                                                                                                                                                                                                                                                                                                clip rule="evenodd"></path>\
                                                                                                                                                                                                                                                                                                                                                                                </svg> \
                                                                                                                                                                                                                                                                                                                                                                                span class = "sr-only" > Info < /span>\
                                                                                                                                                                                                                                                                                                                                                                                <div class ="ml-3 text-sm font-medium text-green-700 dark:text-green-800" >\
                                                                                                                                                                                                                                                                                                                                                                                Pesanan sedang diproses, menunggu konfirmasi!\
                                                                                                                                                                                                                                                                                                                                                                                </div>\
                                                                                                                                                                                                                                                                                                                                                                                <div>'
                        )
                    }
                })
            });

        }); //end document ready
    </script>
@endpush
