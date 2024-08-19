<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan {{ $title }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;400;600;700&family=Poppins:wght@200;300;400;500;600;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
</head>

<body>

    @if ($laporan->count() == 0)
        <div class="mt-10 text-center">
            <b>Tidak ada data laporan</b>
            <a href="/laporan" class="rounded-lg bg-gray-600 p-2 text-white hover:bg-gray-800"><i
                    class="fa fa-circle-left"></i>
                Kembali</a>
        </div>
    @else
        <div class="container">

            <div class="my-5 grid grid-cols-2">
                <div>
                    <h1 class="text-3xl">Smega Mart</h1>
                </div>
                <div class="text-right">
                    Laporan: {{ $inputan }} <br>
                    Profit: Rp. {{ number_format($profit, 0, '.', '.') }} <br>
                    Omset: Rp. {{ number_format($omset, 0, '.', '.') }} <br>
                </div>
            </div>

            <div class="hidden">
                <a href="/laporan" class="rounded-lg bg-gray-600 p-2 text-white hover:bg-gray-800"><i
                        class="fa fa-circle-left"></i>
                    Kembali</a>
                <button onclick="window.print()" class="rounded-lg bg-blue-600 p-2 text-white hover:bg-blue-800"><i
                        class="fa fa-print"></i>
                    Print</button>
                <button onclick="Convert_HTML_To_PDF()" class="rounded-lg bg-red-600 p-2 text-white hover:bg-red-800"><i
                        class="fa fa-download"></i>
                    PDF</button>
                <a href="/laporan" class="rounded-lg bg-green-600 p-2 text-white hover:bg-green-800"><i
                        class="fa fa-download"></i>
                    EXCEL</a>
            </div>

            {{-- <div class="relative my-5 overflow-x-auto"> --}}
            <div class="mx-auto">
                <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400" id="table-datatables">
                    <thead
                        class="bg-gray-50 text-center text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Barcode
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama Barang
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harga Beli
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harga Jual
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Jumlah Jual
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Subtotal
                            </th>
                            {{-- <th scope="col" class="py-3 px-6">
                                Tanggal Jual
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($laporan as $key => $l)
                            <tr class="border-b bg-white text-center dark:border-gray-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="whitespace-nowrap py-4 px-6 font-medium text-gray-900 dark:text-white">
                                    {{ $no++ }}
                                </th>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ $l->barcode }}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ $l->namaBarang }}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ number_format($l->hrgBeli, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ number_format($l->hrgJual, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 text-center text-gray-900 dark:text-white">
                                    {{ $l->jmlhJual }}
                                </td>
                                <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ number_format($l->hrgJual * $l->jmlhJual, 0, ',', '.') }}
                                </td>
                                {{-- <td class="py-4 px-6 text-gray-900 dark:text-white">
                                    {{ date('d-m-Y', strtotime($l->tgl_jual)) }}
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="font-semibold text-gray-900 dark:text-white">
                            <th scope="row" colspan="6" class="py-3 px-6 text-base">Total</th>
                            <td class="py-3 px-6">Rp. {{ number_format($omset, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <a href="/laporan" class="rounded-lg bg-gray-600 p-2 text-white hover:bg-gray-800"><i
                    class="fa fa-circle-left"></i>
                Back</a>
        </div>

    @endif

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
    {{-- <script src="/js/jquery.dataTables.js"></script>
    <script src="/js/jquery.dataTables.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-datatables').DataTable({
                dom: 'Bfrtip',
                buttons: ['excel', 'pdf', 'print']
            });
        });
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <script defer src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script>

</body>

</html>
