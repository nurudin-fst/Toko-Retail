<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Kecil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        @page {
            margin: 0
        }

        body {
            margin: 0;
            font-size: 10px;
            font-family: monospace;
        }

        td {
            font-size: 10px;
        }

        .sheet {
            margin: 0;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
        }

        /** Paper sizes **/
        body.struk .sheet {
            width: 58mm;
        }

        body.struk .sheet {
            padding: 2mm;
        }

        .txt-left {
            text-align: left;
        }

        .txt-center {
            text-align: center;
        }

        .txt-right {
            text-align: right;
        }

        /** For screen preview **/
        @media screen {
            body {
                background: #e0e0e0;
                font-family: monospace;
            }

            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                margin: 5mm;
            }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
            body {
                font-family: monospace;
            }

            body.struk {
                width: 58mm;
                text-align: left;
            }

            body.struk .sheet {
                padding: 2mm;
            }

            .txt-left {
                text-align: left;
            }

            .txt-center {
                text-align: center;
            }

            .txt-right {
                text-align: right;
            }

            .btn-print {
                display: none;
            }
        }
    </style>
</head>

<body onload="window.print()" class="struk" class="justify-center">
    <center>
        <div class="mb-2 text-center">
            <button class="btn-print mt-2 rounded-md bg-blue-700 p-2 text-white" onclick="window.print()">Print</button>
            <a href="/forgetSessionStorage" class="btn-print rounded-md bg-green-500 p-2 text-white">Selesai</a>
            <a href="{{ route('exportPdf') }}" id="exportPdf" class="bg-red-500 text-white hover:bg-red-700">Export
                PDF</a>
        </div>
        <section class="sheet">


            <div class="text-center">
                <h3 style="margin-bottom: 5px;" class="text-bold">SMEGA MART</h3>
                <span>Jalan Mayjend Sungkono 34 Kalimanah Purbalingga 53371</span>
            </div>
            <br>
            <div>
                <p style="float: left;">{{ date('d-m-Y h:i:s') }}</p>
                <p style="float: right">{{ strtoupper(auth()->user()->namaUser) }}</p>
            </div>
            <div class="clear-both" style="clear: both;"></div>
            <p class="text-left">No: {{ $detail->noFakturBeli }}</p>
            <p class="text-left">Supplier: {{ ucfirst($pelanggan->namaSupplier ?? '-') }}</p>
            <p class="text-center">=================================</p>

            <br>
            <table width="100%" style="border: 0;">
                @foreach ($product as $p)
                    <tr>
                        <td colspan="3">{{ ucfirst($p->barang->namaBarang) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $p->jmlBeli }} x {{ number_format($p->hrgBeli) }}</td>
                        <td></td>
                        <td class="text-right">{{ number_format(($p->jmlBeli + $p->jmlStokGudang) * $p->hrgBeli) }}</td>
                    </tr>
                @endforeach
            </table>
            <p class="text-center">---------------------------------</p>

            <table width="100%" style="border: 0;">
                <tr>
                    <td>Harga Produk:</td>
                    <td class="text-right">{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Total Item:</td>
                    <td class="text-right">{{ $product->sum('jmlBeli') }}</td>
                </tr>
                <tr>
                    <td>Grand Total:</td>
                    <td class="text-right">{{ number_format($total, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Kembali:</td>
                    <td class="text-right">{{ number_format($detail->bayar - $total) }}</td>
                </tr>

            </table>

            <p class="text-center">=================================</p>
            <p class="text-center">-- TERIMA KASIH --</p>

            <script src="/js/jquery-3.6.0.min.js"></script>

            <script>
                let body = document.body;
                let html = document.documentElement;
                let height = Math.max(
                    body.scrollHeight, body.offsetHeight,
                    html.clientHeight, html.scrollHeight, html.offsetHeight
                );

                document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                document.cookie = "innerHeight=" + ((height + 50) * 0.264583);

                // $(document).on("click", '#exportPdf', function(e) {
                //     e.preventDefault();
                //     setTimeout(function() { // wait for 5 secs(2)
                //         location.reload(true); // then reload the page.(3)
                //     }, 100);
                // })
            </script>
    </center>
</body>

</html>
