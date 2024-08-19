{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Kecil</title>

    <?php
    $style = '
                                                                                                                                                                                                                                                                                                                          <style>
                                                                                                                                                                                                                                                                                                                              * {
                                                                                                                                                                                                                                                                                                                                  font-family: "consolas", sans-serif;
                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                              p {
                                                                                                                                                                                                                                                                                                                                  display: block;
                                                                                                                                                                                                                                                                                                                                  margin: 3px;
                                                                                                                                                                                                                                                                                                                                  font-size: 10pt;
                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                              table td {
                                                                                                                                                                                                                                                                                                                                  font-size: 9pt;
                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                              .text-center {
                                                                                                                                                                                                                                                                                                                                  text-align: center;
                                                                                                                                                                                                                                                                                                                              }
                                                                                                                                                                                                                                                                                                                              .text-right {
                                                                                                                                                                                                                                                                                                                                  text-align: right;
                                                                                                                                                                                                                                                                                                                              }

                                                                                                                                                                                                                                                                                                                              @media print {
                                                                                                                                                                                                                                                                                                                                  @page {
                                                                                                                                                                                                                                                                                                                                      margin: 0;
                                                                                                                                                                                                                                                                                                                                      size: 75mm
                                                                                                                                                                                                                                                                                                                          ';
    ?>
    <?php
    $style .= !empty($_COOKIE['innerHeight']) ? $_COOKIE['innerHeight'] . 'mm; }' : '}';
    ?>
    <?php
    $style .= '
                                                                                                                                                                                                                                                                                                                            html, body {
                                                                                                                                                                                                                                                                                                                                width: 70mm;
                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                            .btn-print {
                                                                                                                                                                                                                                                                                                                                display: none;
                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                    </style>
                                                                                                                                                                                                                                                                                                                    ';
    ?>

    {!! $style !!}
</head>

<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: 1rem;" onclick="window.print()">Print</button>
    <a href="/orders/selesai" class="btn-print text-center"
        style="text-decoration:none; padding:3px; background:green; color:white; margin:20px;">Kembali</a>
    <div class="text-center">
        <h3>Smega Mart</h3>
    </div>
    <br>
    <div class="clear-both" style="clear: both;"></div>
    <p>No Faktur: {{ $detail->noFaktur }}</p>
    <p>Nama Pemesan: <span style="text-transform: uppercase;">{{ $detail->user->namaUser }}</span></p>
    <p>No Hp: {{ $detail->user->noHp }}</p>
    <p>Alamat Pengiriman:{{ $detail->alamat }}</p>
    <p style="margin-top: 3px">{{ $time }}</p>
    <p class="text-center">=================================</p>

    <br>
    <table width="100%" style="border: 0;">
        @foreach ($barang as $brg)
            <tr>
                <td colspan="3">{{ $brg->namaBarang }}</td>
            </tr>
            <tr>
                <td>{{ $brg->qty }} x {{ number_format($brg->hrgJual) }}</td>
                <td></td>
                <td class="text-right">{{ number_format($brg->qty * $brg->hrgJual) }}</td>
            </tr>
        @endforeach
    </table>
    <p class="text-center">---------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Harga:</td>
            <td class="text-right">{{ number_format($detail->subtotal) }}</td>
        </tr>
        <tr>
            <td>Total Item:</td>
            <td class="text-right">{{ $totalItem }}</td>
        </tr>
        <tr>
            <td>Total Bayar:</td>
            <td class="text-right">{{ number_format($detail->subtotal) }}</td>
        </tr>
    </table>

    <p class="text-center">=================================</p>
    <p class="text-center">-- TERIMA KASIH --</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
    </script>
</body>

</html> --}}

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
            <a href="/orders" class="btn-print rounded-md bg-green-500 p-2 text-white">Pesanan
                Baru</a>
        </div>
        <section class="sheet">


            <div class="mb-3 text-center">
                <h3 style="margin-bottom: 5px;" class="text-bold text-lg">SMEGA MART</h3>
                <span>Jalan Mayjend Sungkono 34 Kalimanah Purbalingga 53371</span>
            </div>
            <br>
            <div>
                <p style="float: left;">{{ date('d-m-Y h:i:s') }}</p>
                <p style="float: right">{{ strtoupper(auth()->user()->namaUser) }}</p>
            </div>
            <div class="clear-both" style="clear: both;"></div>
            <p class="text-left">No Faktur: {{ $detail->noFaktur }}</p>
            <p class="text-left">Nama Pemesan: {{ ucfirst($detail->user->namaUser) ?? '' }}</p>
            <p class="text-left">No Hp: {{ $detail->user->noHp ?? '' }}</p>
            <p class="text-left">Alamat pengiriman: {{ ucfirst($detail->alamat) }}</p>
            <p class="text-center">=================================</p>

            <br>
            <table width="100%" style="border: 0;">
                @foreach ($barang as $b)
                    <tr>
                        <td colspan="3">{{ ucfirst($b->namaBarang) }}</td>
                    </tr>
                    <tr>
                        <td>{{ $b->qty }} x {{ number_format($b->hrgJual) }}</td>
                        <td></td>
                        <td class="text-right">{{ number_format($b->qty * $b->hrgJual) }}</td>
                    </tr>
                @endforeach
            </table>
            <p class="text-center">---------------------------------</p>

            <table width="100%" style="border: 0;">
                <tr>
                    <td>Total Harga:</td>
                    <td class="text-right">{{ number_format($detail->subtotal) }}</td>
                </tr>
                <tr>
                    <td>Total Item:</td>
                    <td class="text-right">{{ $barang->sum('qty') }}</td>
                </tr>
                <tr>
                    <td>Total Bayar:</td>
                    <td class="text-right">{{ number_format($detail->subtotal) }}</td>
                </tr>

            </table>

            <p class="text-center">=================================</p>
            <p class="text-center">-- TERIMA KASIH --</p>

            <script>
                let body = document.body;
                let html = document.documentElement;
                let height = Math.max(
                    body.scrollHeight, body.offsetHeight,
                    html.clientHeight, html.scrollHeight, html.offsetHeight
                );

                document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                document.cookie = "innerHeight=" + ((height + 50) * 0.264583);
            </script>
    </center>
</body>

</html>
