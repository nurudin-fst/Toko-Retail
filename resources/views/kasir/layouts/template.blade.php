<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta http-equiv="refresh" content="15"> --}}

    <title>{{ $title }} | Kasir Smega Mart</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>

    <link href="/css/app.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> --}}
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
                            class="{{ request()->is('kasir*') || request()->is('brg*') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
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
                            class="{{ request()->is('laporan*') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
                            aria-current="page">Laporan</a>
                    </li>
                    <li>
                        <a href="/orders"
                            class="{{ request()->is('orders*') ? 'text-black bg-white md:bg-white md:text-black p-3' : 'md:text-white' }} block rounded py-2 pr-4 pl-3 text-black hover:text-black md:p-2 md:hover:bg-transparent md:hover:bg-blue-800 md:hover:text-white"
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
        @elseif ($title == 'Kasir')
            <div
                class="container mx-auto flex max-w-7xl flex-wrap items-center justify-between py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="flex text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>

                <!-- drawer init and toggle -->
                <div class="text-right">
                    {{-- <button
                        class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe"
                        data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]"
                        aria-controls="drawer-swipe">
                        Cari Barang
                    </button> --}}
                    <a href="/brg"
                        class="mr-2 mb-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe"
                        data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]"
                        aria-controls="drawer-swipe">
                        Cari Barang
                    </a>
                </div>
            </div>
        @elseif ($title == 'Barang Kasir')
            <div
                class="container mx-auto flex max-w-7xl flex-wrap items-center justify-between py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="flex text-3xl font-bold tracking-tight text-gray-900">{{ $title }}</h1>

                <div class="px-2 md:basis-8/12">
                    <button type="button"
                        class="tex-gray-500 mr-1 rounded-lg p-2.5 text-sm hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 md:hidden"
                        data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false">
                        <svg class="h-5 w-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Cari</span>
                    </button>
                    <div class="relative hidden items-center md:block">
                        <div class="relative mt-3 md:mt-0">
                            <form method="get">
                                <div class="flex">
                                    <div class="relative w-full">
                                        <input type="search" id="search-dropdown"
                                            class="autocomplete z-20 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-[#c51826] focus:ring-[#c51826] sm:rounded-l-none"
                                            placeholder="Cari nama produk..." name="search"
                                            value="{{ request('search') }}" id="search">
                                        <button type="submit"
                                            class="absolute top-0 right-0 rounded-r-lg border border-[#bb1724] bg-[#bb1724] p-2.5 text-sm font-medium text-white hover:bg-[#ac1521] focus:outline-none focus:ring-4 focus:ring-red-300">
                                            <svg aria-hidden="true" class="h-5 w-5" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                            </svg>
                                            <span class="sr-only">Cari</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="navbar-search"
                    class="absolute top-9 left-0 z-10 hidden w-full items-center justify-between md:hidden">
                    <div class="relative mt-3">
                        <form method="get">
                            <div class="flex">
                                <div class="relative mt-20 w-full">
                                    <input type="search" id="search-dropdown"
                                        class="autocomplete z-20 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-lg focus:border-[#c51826] focus:ring-[#c51826] sm:rounded-l-none"
                                        placeholder="Cari nama produk..." name="search"
                                        value="{{ request('search') }}" id="search">
                                    <button type="submit"
                                        class="absolute top-0 right-0 rounded-r-lg border border-[#bb1724] bg-[#bb1724] p-2.5 text-sm font-medium text-white hover:bg-[#ac1521] focus:outline-none focus:ring-4 focus:ring-red-300">
                                        <svg aria-hidden="true" class="h-5 w-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <span class="sr-only">Cari</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- drawer init and toggle -->
                <div class="text-right">
                    {{-- <a href="{{ route('kasir.index') }}">Kembali</a> --}}
                    <button id="kasirBack"
                        class="rounded-md bg-gray-500 p-2 text-white hover:bg-gray-700">Kembali</button>
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
                    @yield('content')
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

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <script defer src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>

    <script>
        $(document).on("click", "#kasirBack", function(e) {
            e.preventDefault();
            setTimeout(function() {
                window.location.href = "{{ route('kasir.index') }}";
                // location.reload(true);
            }, 10);
        })
    </script>
</body>

</html>
