@extends('kasir.layouts.template')
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="m-3">
            <table class="w-full bg-[#bb1724] text-left text-sm text-white" id="table-datatables">
                <thead class="bg-[#bb1724] text-xs uppercase text-white dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="py-2 px-6">
                            #
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
                            Jumlah
                        </th>
                        <th scope="col" class="py-2 px-6 text-center">
                            Tanggal Jual
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $key => $b)
                        <tr class="border-b bg-white text-black hover:bg-gray-50">
                            <th class="m-auto w-auto border text-center">
                                {{ $key + 1 }}
                            </th>
                            <td scope="row"
                                class="flex max-w-sm items-center whitespace-nowrap py-2 px-6 text-gray-900 dark:text-white">
                                <div class="pl-3">
                                    <div class="text-base font-semibold text-black">{{ $b->namaBarang }}</div>
                                    <div class="block font-normal text-black">{{ $b->barcode }}</div>
                                </div>
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ $b->hrgBeli }}
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ $b->hrgJual }}
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ $b->jmlhJual }}
                            </td>
                            <td class="py-2 px-6 text-center">
                                {{ date('d-m-Y', strtotime($b->tgl_jual)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    <!-- drawer component -->
    <div id="drawer-swipe"
        class="fixed z-40 mt-5 w-full overflow-y-auto rounded-t-lg border-t border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800"
        tabindex="-1" aria-labelledby="drawer-swipe-label">
        <div class="cursor-pointer p-4 hover:bg-gray-50 dark:hover:bg-gray-700" data-drawer-toggle="drawer-swipe">
            <span class="absolute top-3 left-1/2 h-1 w-8 -translate-x-1/2 rounded-lg bg-gray-300 dark:bg-gray-600"></span>
            <h5 id="drawer-swipe-label" class="inline-flex items-center text-base text-gray-500 dark:text-gray-400">
                <i class="fa-solid fa-memo-pad"></i> Laporan
            </h5>
        </div>
        <div class="md:m-5">
            <div class="grid grid-cols-2 gap-6 md:mb-5 md:grid-cols-4">
                <div class="w-full rounded-lg bg-white shadow-lg">
                    <form action="/laporan/date" method="post">
                        @csrf
                        <div class="m-3">
                            <label for="today" class="mb-3 font-bold">Tanggal</label>
                            <input type="date" class="w-full rounded-lg p-2" name="date">
                            <button type="submit"
                                class="mx-auto mt-2 w-full rounded-lg bg-blue-600 p-2 text-center text-white hover:bg-blue-700">Cek
                                Laporan</button>
                        </div>
                    </form>
                </div>
                <div class="w-full rounded-lg bg-white shadow-lg">
                    <div class="m-3">
                        <form action="/laporan/month" method="post">
                            @csrf
                            <label for="today" class="mb-3 font-bold">Bulan</label>
                            <input type="month" class="w-full rounded-lg p-2" name="month">
                            <button
                                class="mx-auto mt-2 w-full rounded-lg bg-blue-600 p-2 text-center text-white hover:bg-blue-700">Cek
                                Laporan</button>
                        </form>
                    </div>
                </div>
                <div class="w-full rounded-lg bg-white shadow-lg">
                    <div class="m-3">
                        <form action="/laporan/year" method="post">
                            @csrf
                            <label for="year" class="mb-3 font-bold">Tahun</label>
                            <select name="year" id="year" class="w-full rounded-lg p-2">
                                <option value="">Pilih Tahun</option>
                                <?php
                                $year = date('Y');
                                $min = $year - 5;
                                $max = $year;
                                for ($i = $max; $i >= $min; $i--) {
                                    echo '<option name="year" value=' . $i . '>' . $i . '</option>';
                                } ?>
                            </select>
                            <button
                                class="mx-auto mt-2 w-full rounded-lg bg-blue-600 p-2 text-center text-white hover:bg-blue-700"
                                type="submit">Cek
                                Laporan</button>
                        </form>
                    </div>
                </div>
                <div class="w-full rounded-lg bg-white shadow-lg">
                    <div class="m-3">
                        <form action="/laporan/name" method="post">
                            @csrf
                            <label for="name" class="mb-3 font-bold">Nama</label>
                            <select name="name" id="name" class="w-full rounded-lg p-2">
                                <option value="">Pilih Produk</option>
                                @foreach ($barang as $b)
                                    <option value="{{ $b->namaBarang }}">{{ $b->namaBarang }}</option>
                                @endforeach
                            </select>
                            <button
                                class="mx-auto mt-2 w-full rounded-lg bg-blue-600 p-2 text-center text-white hover:bg-blue-700">Cek
                                Laporan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-3 grid grid-cols-1 gap-6">
                <div class="w-full rounded-lg bg-white shadow-lg">
                    <div class="m-3">
                        <form action="/laporan/range" method="post">
                            @csrf
                            <div class="grid grid-cols-2 gap-8">
                                <div>
                                    <label for="today" class="mb-3 font-bold">Tanggal Mulai :</label>
                                    <input type="date" name="first" class="w-full rounded-lg p-2">
                                </div>
                                <div>
                                    <label for="today" class="mb-3 font-bold">Tanggal Akhir :</label>
                                    <input type="date" name="last" class="w-full rounded-lg p-2">
                                </div>
                            </div>

                            <button
                                class="mx-auto mt-2 w-full rounded-lg bg-blue-600 p-2 text-center text-white hover:bg-blue-700">Cek
                                Laporan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
