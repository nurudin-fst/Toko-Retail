<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="refresh" content="15">

    <title>{{ $title }} | Kasir Smega Mart</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
</head>

<body class="antialiased">


    <nav
        class="fixed top-0 left-0 z-20 w-full border-b border-gray-200 bg-[#bb1724] py-2.5 text-white dark:border-gray-600 sm:px-4">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <a href="/admin-dashboard" class="ml-3 flex items-center sm:ml-0">
                {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo"> --}}
                <span class="self-center whitespace-nowrap text-xl font-semibold dark:text-white"><b>KASIR</b> | Smega
                    Mart</span>
            </a>
            <div class="flex md:order-2">
                <a href="/logout" type="submit"
                    class="mr-3 rounded-lg bg-yellow-400 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 md:mr-0">Logout</a>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center rounded-lg bg-gray-100 p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 md:hidden"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden w-full items-center justify-between md:order-1 md:flex md:w-auto" id="navbar-sticky">
                <ul
                    class="mt-4 flex flex-col rounded-lg border border-gray-100 bg-white p-4 text-black md:mt-0 md:flex-row md:space-x-8 md:border-0 md:bg-[#bb1724] md:text-sm md:font-medium">
                    <li>
                        <a href="{{ route('kasir.index') }}"
                            class="{{ request()->is('kasir') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
                            aria-current="page">Kasir</a>
                    </li>

                    @auth
                        @if (auth()->user()->level == 'Admin')
                            <li>
                                <a href="/dashboard"
                                    class="{{ request()->is('dashboard') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
                                    aria-current="page">Admin</a>
                            </li>
                        @endif
                    @endauth

                    <li>
                        <a href="{{ route('laporan.index') }}"
                            class="{{ request()->is('laporan') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
                            aria-current="page">Laporan</a>
                    </li>
                    <li>
                        <a href="/orders"
                            class="{{ request()->is('orders') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
                            aria-current="page">Pesanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- <div class="mx-10 max-w-lg">
        <div role="status">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 mt-20 my-7">
                <h1 class="text-3xl tracking-tight font-bold text-gray-900">{{ $title }}</h1>
            </div>
            <div class="max-w-lg shadow-md ml-7">
                @yield('content')
            </div>
        </div>
    </div> --}}
    <header class="mt-16 bg-white shadow sm:mt-20">
        @if ($title == 'Laporan')
            <div
                class="container mx-auto flex max-w-7xl flex-wrap items-center justify-between py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="flex text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>

                <!-- drawer init and toggle -->
                <div class="text-right">
                    <button
                        class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe"
                        data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]"
                        aria-controls="drawer-swipe">
                        Cek Laporan
                    </button>
                </div>
            </div>
        @else
            <div
                class="container mx-auto flex max-w-7xl flex-wrap items-center justify-between py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="flex text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>
            </div>
        @endif
    </header>
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <div class="px-4 py-6 sm:px-0">
                <div class="h-96 rounded-lg">

                    @if (session()->has('success'))
                        <div id="alert-3" class="mb-4 flex rounded-lg bg-green-100 p-4 dark:bg-green-200"
                            role="alert">
                            <svg aria-hidden="true" class="h-5 w-5 flex-shrink-0 text-green-700 dark:text-green-800"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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

                    @if ($brg->count() == 0)
                        <h1 class="m-5 text-center text-red-700">
                            Tidak ada pesanan yang harus diproses
                        </h1>
                    @else
                        {{-- diproses status 0 --}}

                        {{-- form checkout --}}

                        {{-- produk --}}




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
                                            @foreach ($brg as $key => $b)
                                                <tr
                                                    class="border-b bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{ $key + 1 }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{ $b->noFaktur }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{ $b->user->namaUser }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{ $b->alamat }}
                                                    </td>
                                                    <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        Rp. {{ number_format($b->subtotal, 0, ',', '.') }}
                                                    </td>
                                                    <td
                                                        class="flex py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                        {{-- <form action="{{ route('rinci.update', [$b->id]) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" value="{{ $b->id }}" name="id" id="id">
                                            <input type="hidden" value="1" name="status" id="status">
                                            <input type="hidden" value="{{ $b->noFaktur }}" name="noFaktur"
                                                id="noFaktur">
                                            <button type="submit"
                                                class="mx-2 rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800">Setuju</button>
                                        </form> --}}
                                                        <form action="{{ route('order.show', [$b->noFaktur]) }}"
                                                            method="get">
                                                            {{-- @csrf --}}
                                                            <input type="hidden" name="noFaktur" id="noFaktur"
                                                                value="{{ $b->noFaktur }}">
                                                            {{-- <input type="hidden" name="id" id="id"
                                                    value="{{ $b->id }}"> --}}
                                                            <button
                                                                class="mx-2 rounded-lg bg-green-400 p-2 text-white hover:bg-green-700">Detail</button>
                                                        </form>
                                                    </td>


                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </a>
                            {{-- @endforeach --}}
                    @endif

                    {{-- <script>
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
    </script> --}}

                </div>
            </div>
            <!-- /End replace -->
        </div>
    </main>

    {{-- <div class="bg-gray-200">
<div class="container">
<div class="py-6 px-3" style="bottom: 0;">
    <p class="text-sm text-center text-gray-500"><b>&copy 2022</b> Dibuat oleh <a
            href="https://softdev.akriliklasercutting.com" target="_blank" class="font-bold">SOFTDEV
            COMMUNITY</a> dengan sepenuh &#10084;&#65039;</p>
</div>
</div>
</div> --}}

    {{-- export pdf dll --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-datatables').DataTable({
                // dom: 'Bfrtip',
                buttons: ['excel', 'pdf', 'print']
            });
        });
    </script>

    {{-- <script src="/js/kasir.js"></script> --}}

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <script defer src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>
</body>

</html>
