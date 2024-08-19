@extends('kasir.layouts.template')
@section('content')
    @if (session()->has('success'))
        <div id="alert-3" class="mb-4 flex rounded-lg bg-green-100 p-4 dark:bg-green-200" role="alert">
            <svg aria-hidden="true" class="h-5 w-5 flex-shrink-0 text-green-700 dark:text-green-800" fill="currentColor"
                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ session('success') }}
            </div>
            <button type="button"
                class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-green-100 p-1.5 text-green-500 hover:bg-green-200 focus:ring-2 focus:ring-green-400 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    @include('kasir.pages.order.navtab')

    @if ($brgBatal->count() == 0)
        <h1 class="m-5 text-center text-red-700">
            Tidak ada barang yang dibatalkan
        </h1>
    @else
        {{-- diproses status 0 --}}

        {{-- form checkout --}}

        {{-- produk --}}




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
                                    No Faktur
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Nama Pengirim
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Alamat Pengiriman
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
                            @foreach ($brgBatal as $key => $b)
                                <tr
                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $b->noFaktur }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $b->namaBarang }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $b->qty }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        Rp. {{ number_format($b->subtotal, 0, ',', '.') }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        {{ $b->created_at }}
                                    </td>
                                    {{-- <td class="flex py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                        <form action="{{ route('order.show', [$b->id]) }}" method="get">
                                            @csrf
                                            <input type="hidden" name="noFaktur" id="noFaktur"
                                                value="{{ $b->noFaktur }}">
                                            <input type="hidden" name="id" id="id"
                                                value="{{ $b->id }}">
                                            <button
                                                class="mx-2 rounded-lg bg-green-400 p-2 text-white hover:bg-green-700">Detail</button>
                                        </form>
                                    </td> --}}

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </a>
            {{-- @endforeach --}}
    @endif

    {{-- @foreach ($brgBatal as $key => $b)
        <!-- Main modal -->
        <div id="defaultModal/{{ $b->noFaktur }}" tabindex="-1" aria-hidden="true"
            class="fixed top-0 right-0 left-0 z-50 hidden h-modal w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 md:h-full">
            <div class="relative h-full w-full max-w-2xl p-4 md:h-auto">
                <!-- Modal content -->
                <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between rounded-t border-b p-4 dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            {{ $b->noFaktur }}
                        </h3>
                        <button type="button"
                            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="defaultModal/{{ $b->noFaktur }}">
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
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Nama penerima: {{ $b->user->namaUser }} <br>
                            Alamat Pengiriman: {{ $b->alamat }} <br>
                            Barang dibeli:
                            <input type="hidden" name="noFaktur" id="noFaktur" value="{{ $b->noFaktur }}">
                            @foreach ($brgBatalb as $bk)
                                <ol>
                                    <li>{{ $b->order->n }}</li>
                                    <li>{{ $b->hrgJual }} * {{ $b->qty }} =
                                        {{ $b->hrgJual * $b->qty }}</li>
                                </ol>
                            @endforeach
                            Total dibayar: {{ $b->total }}
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center space-x-2 rounded-b border-t border-gray-200 p-6 dark:border-gray-600">
                        <button data-modal-toggle="defaultModal/{{ $b->noFaktur }}" type="button"
                            class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I
                            accept</button>
                        <button data-modal-toggle="defaultModal/{{ $b->noFaktur }}" type="button"
                            class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:border-gray-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}


    <script>
        // $(document).ready(function() {
        $(document).on("click", "#setuju", function(e) {
            e.preventDefault();

            var data = {
                'status': $('#status').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/orders/{id}",
                data: data,
                dataType: "json",
                success: function(response) {}
            })

        })
        // })
    </script>
@endsection
