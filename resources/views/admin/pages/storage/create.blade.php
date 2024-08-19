@extends('admin.layouts.template')
@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <div class="mb-4 flex rounded-lg bg-red-100 p-4 text-sm text-red-700 dark:bg-red-200 dark:text-red-800"
                role="alert">
                <svg aria-hidden="true" class="mr-3 inline h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $error }}</span>
                </div>
            </div>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-2 gap-6 md:grid-cols-3">
        <div>
            <input type="hidden" id="noFakturBeli" name="noFakturBeli" value="{{ $noFakturBeli }}">
            <input type="text" class="w-full rounded-lg border p-2 autocomplete" placeholder="Barcode" id="barcode" name="barcode"
                autofocus>
            <input type="hidden" id="barcodeHidden" name="barcodeHidden">
            <input type="hidden" id="namaBarangHidden" name="namaBarangHidden">
        </div>
        <div>
            <input type="number" class="w-full rounded-lg border p-2" placeholder="Jumlah stok Toko" min="1"
                id="jmlBeli" name="jmlBeli" value="1">
            <input type="hidden" id="jmlBeli" name="jmlBeli">
            <input type="hidden" id="hrgJual" name="hrgJual">
            <input type="hidden" id="hrgBeliHidden" name="hrgBeliHidden">
          </div>
          <div>
            <input type="number" class="w-full rounded-lg border p-2" placeholder="Jumlah Stok Gudang" min="0"
            id="jmlStokGudang" name="jmlStokGudang" value="0">
            <input type="hidden" id="jmlStokGudangHidden">
        </div>
        <div>
            <input type="text" class="w-full rounded-lg border bg-gray-100 p-2" placeholder="Nama Barang" disabled
                id="namaBarang" name="namaBarang">
        </div>
        <div>
            <input type="number" class="w-full rounded-lg border bg-gray-100 p-2" placeholder="Harga Beli" disabled
                id="hrgBeli">
        </div>
    </div>
    <button type="submit" class="mx-auto mt-3 rounded-lg bg-green-400 p-2 text-sm text-white hover:bg-green-600"
        id="btnTambah"><i class="fa fa-plus"></i>
        Tambah</button>

    <div class="mx-auto mt-5 grid grid-cols-1 md:grid-cols-2">
        <div>
            <table class="w-full shadow-lg" id="tabelKasir">
                <thead class="rounded-lg bg-[#bb1724] text-white text-center">
                    <tr>
                        {{-- <th>#</th> --}}
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Stok Toko</th>
                        <th>Stok Gudang</th>
                        <th>harga Beli</th>
                        {{-- <th>Sub Total</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($pembelian as $p)
                  <tr class= "border-b bg-white text-black hover:bg-gray-50 text-center w-full text-sm">
                    <td class="items-center py-3 px-7 dark:text-white">{{ $p->barcode }}</td>
                    <form action="{{ route('updateJml', [$p->id])}}" method="POST">
                      {{-- @method('put') --}}
                      @csrf
                      <td class="text-left py-3 px-8 dark:text-white">{{ ucfirst($p->namaBarang) }}</td>
                    <td class="items-center py-3 px-7 dark:text-white">
                      <input type="number" class="block w-11 rounded-lg border border-gray-300 bg-gray-50 px-2.5 py-1 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"\
                        placeholder="1" required="" min="0" value="{{ $p->jmlBeli }}"
                        name="jmlBeli" id="jmlBeli"></td>
                    </td>
                    <td class="items-center py-3 px-7 dark:text-white">
                      <input type="number" class="block w-11 rounded-lg border border-gray-300 bg-gray-50 px-2.5 py-1 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"\
                        placeholder="1" required="" min="0" value="{{ $p->jmlStokGudang }}"
                        name="jmlStokGudang" id="jmlStokGudang"></td>
                    </td>
                    <td class="items-center py-3 px-7 dark:text-white">{{ number_format($p->hrgBeli,0,',','.') }}</td>
                    <td class="items-center flex py-3 px-7 dark:text-white mt-2">
                      <button class="bg-yellow-400 hover:bg-yellow-500 text-white p-1 rounded-md mx-2 my-auto">Update</button>
                    </form>
                      <form action="{{ route('storage.destroy', [$p->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $p->id }}" name="id" id="id">
                        <button class="bg-red-600 hover:bg-red-700 text-white p-1 rounded-md">Hapus</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>

        </div>
        <div class="ml-5 items-center justify-center">
            <div id="formPembelian"></div>
            <input type="hidden" id="kdUser" name="kdUser" value="{{ auth()->user()->kdUser }}">

    <script src="/js/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script>
        function numThousand(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        let barcode = document.querySelector("#barcode");
        let barcodelHidden = document.querySelector("#barcodeHidden");
        let jmlStokGudang = document.querySelector("#jmlStokGudang");
        let jmlStokGudangHidden = document.querySelector("#jmlStokGudangHidden");
        let jmlBeli = document.querySelector("#jmlBeli");

        let namaBarang = document.querySelector("#namaBarang");
        let namaBarangHidden = document.querySelector("#namaBarangHidden");
        let hrgBeli = document.querySelector("#hrgBeli");
        let hrgJual = document.querySelector("#hrgJual");
        let hrgJualHidden = document.querySelector("#hrgJualHidden");
        let hrgBeliHidden = document.querySelector("#hrgBeliHidden");

        let btnTambah = document.querySelector("#btnTambah");
        let btnSimpan = document.querySelector("#btnSimpan");
        let total = document.querySelector("#total");
        let kode = document.querySelector("#kode");
        let save = document.querySelector("#save");

        // let tabelKasir = document
        //     .querySelector("#tabelKasir")
        //     .getElementsByTagName("tbody")[0];

        barcode.addEventListener("input", function() {
            fetch(`/kasir-barcode-data?barcode=${barcode.value}`)
                .then((response) => response.json())
                .then((data) => {
                    if (data.barang !== null) {
                        barcodelHidden.value = data.barang.barcode;
                        namaBarang.value = data.barang.namaBarang;
                        namaBarangHidden.value = data.barang.namaBarangHidden;
                        hrgBeli.value = data.barang.hrgBeli;
                        hrgBeliHidden.value = data.barang.hrgBeliHidden;
                        hrgJual.value = data.barang.hrgJual;
                        console.log(data)
                    } else {
                        // barcode.value = "";
                        barcodelHidden.value = "";
                        namaBarang.value = "";
                        namaBarangHidden.value = "";
                        jmlStokGudangHidden = "";
                        jmlStokGudang = "";
                        hrgBeli.value = "";
                        hrgJual.value = "";
                    }
                })
        });

        $(document).ready(function() {
            detail();
            // total();
            formPembelian();
            // dataSimpan();
            // simpan();
            function detail() {
                $.ajax({
                    type: "GET",
                    url: "/admin/detail/{noFakturBeli}",
                    dataType: "json",
                    success: function(response) {

                        console.log(response.pembelian);
                        // console.log(response.total);

                        // $('tbody').html('');
                        // $.each(response.pembelian, function(key, item) {
                        //     $('tbody').append(
                        //         '<tr class= "border-b bg-white text-black hover:bg-gray-50 text-center w-full">\
                        //           <td class="items-center py-3 px-7 dark:text-white">' +item.barcode +'</td>\
                        //         <td class="items-center py-3 px-7 dark:text-white">' + item.namaBarang +
                        //         '</td>\
                        //         <td class="items-center py-3 px-7 dark:text-white">' +item.jmlBeli +
                        //         '</td>\
                        //         <td class="items-center py-3 px-7 dark:text-white">' +item.jmlStokGudang +
                        //         '</td>\
                        //         <td class="items-center py-3 px-7 dark:text-white">' + numThousand(item.hrgBeli) +
                        //         '</td>\
                        //         <td class="items-center py-3 px-7 dark:text-white">' + numThousand(item.hrgBeli * (item.jmlBeli + item.jmlStokGudang)) +'</td>\
                        //         </tr>')
                        // });
                    }
                })
            }

            // function total() {
            //     $.ajax({
            //         type: "GET",
            //         url: "/admin/detail/{noFakturBeli}",
            //         dataType: "json",
            //         success: function(response) {

            //             // console.log(response.pembelian);
            //             // console.log(response.total);
            //             $('#total').html('');
            //             $('#total').append(
            //                 '<input type="number" id="total" class="w-full p-2" min="0" value="'+response.total + '" disabled>');
            //         }
            //     })
            // }


            function formPembelian() {
                $.ajax({
                    type: "GET",
                    url: "/admin/detail/{noFakturBeli}",
                    dataType: "json",
                    success: function(response) {
                        $('#formPembelian').html('');
                        $('#formPembelian').append('<form action="{{ route('pembelian.simpan') }}" method="post">\
                        @csrf\
                        <div class="m-3">\
                            <div class="grid w-full grid-cols-1">\
                                <div class="my-3">\
                                <div class="grid grid-cols-2 gap-7">\
                                    <b class="text-center">Supplier:</b>\
                                    <select name="kdSupplier" id="kdSupplier" class="w-full rounded-lg border p-2">\
                                        <option value="">Pilih supplier</option>\
                                        @foreach ($supplier as $s)\
                                            <option value="{{ $s->kdSupplier }}">{{ $s->namaSupplier }}</option>\
                                        @endforeach\
                                    </select>\
                                </div>\
                            </div>\
                            <div class="my-3">\
                                <div class="grid grid-cols-2 gap-7">\
                                    <b class="text-center">Bayar:</b>\
                                    <input type="number" class="w-full p-2" id="bayar" name="bayar" required>\
                                </div>\
                            </div>\
                            <div class="my-3">\
                                <div class="grid grid-cols-2 gap-7">\
                                    <b class="text-center">Total:</b>\
                                    <div id="total">'+numThousand(response.total)+'</div>\
                                </div>\
                            </div>\
                            <div class="grid grid-cols-2 gap-7">\
                                <b class="text-center">Kembali:</b>\
                                <div id="kembali"></div>\
                                </div>\
                                </div>\
                                </div>\
                                <input type="hidden" id="kdUser" name="kdUser" value="{{ auth()->user()->kdUser }}">\
                                <input type="hidden" id="noFakturBeli" name="noFakturBeli" value="{{ $noFakturBeli }}">\
                                <div class="grid grid-cols-3 max-w-xs mb-4">\
                                    <input type="hidden" class="w-full p-2" id="tglBeli" min="0" name="tglBeli" value="{{ $tglBeli }}">\
                                <div></div>\
                                <button type="submit" id="btnSimpan" class="w-[150px] text-semibold rounded-lg bg-blue-600 p-2 text-center text-sm text-white">Simpan Transaksi</button>\
                                <div></div>\
                            </div>\
                            </div>\
                        </div>\
                    </div>\
                    </form>')
                    }
                })

            }


            $(document).on("input", '#bayar', function(e) {
                e.preventDefault();
                var bayar = {
                    'bayar': $('#bayar').val(),
                }

                $.ajax({
                    type: "GET",
                    url: "/admin/detail/{noFakturBeli}",
                    data: bayar,
                    dataType: "json",
                    success: function(response) {
                        $('#kembali').html('');
                        $('#kembali').append(
                            '<div>' +
                            numThousand(response.kembali) + '</div>');
                    }
                })
            })

            // bayar.addEventListener('keyup', function() {
            //     document.querySelector("#bayar").innerHTML = numThousand(bayar.value);
            // });

            $(document).on("click", '#btnTambah', function(e) {
                e.preventDefault();

                var data = {
                    'noFakturBeli': $('#noFakturBeli').val(),
                    'barcode': $('#barcode').val(),
                    'namaBarang': $('#namaBarang').val(),
                    'jmlBeli': $('#jmlBeli').val(),
                    'hrgJual': $('#hrgJual').val(),
                    'hrgBeli': $('#hrgBeli').val(),
                    'jmlStokGudang': $('#jmlStokGudang').val(),
                }
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('pembelian.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                      setTimeout(function(){// wait for 5 secs(2)
                        location.reload(true); // then reload the page.(3)
                      }, 100);
                      $('#barcode').attr('autofocus' , 'true');
                    },
                })
            });

            // $(document).on("click", '#btnSimpan', function(e) {
            //     e.preventDefault();

            //     var data = {
            //         'noFakturBeli': $('#noFakturBeli').val(),
            //         'tglBeli': $('#tglBeli').val(),
            //         'kdSupplier': $('#kdSupplier').val(),
            //         'kdUser	': $('#kdUser').val(),
            //     }
            //     console.log(data);
            //     if (data.kdSupplier == '') {
            //       $('#error').html('');
            //       $('#error').append('<div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">\
            //         <span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.\
            //         </div>')
            //     }

            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });

            //     $.ajax({
            //         type: "POST",
            //         url: "{{ route('pembelian.simpan') }}",
            //         data: data,
            //         dataType: "json",
            //         success: function(response) {
            //             detail();
            //             formPembelian();
            //         }
            //     })
            // });



        }); //Document stop
    </script>
@endsection
