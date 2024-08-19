@extends('kasir.layouts.template')
@section('content')
    <div id="success"></div>
    <div class="relative mt-3 overflow-x-auto sm:rounded-lg">
        <table class="mx-auto h-auto justify-center" id="table-datatables">
            <thead class="rounded-lg bg-[#bb1724] text-white">
                <tr>
                    <th class="px-5">#</th>
                    <th class="px-5">Barcode</th>
                    <th class="px-8">Nama Barang</th>
                    <th class="px-5">Jumlah</th>
                    <th class="px-5">harga jual</th>
                    {{-- <th class="px-5">Sub Total</th> --}}
                    <th class="px-5">Aksi</th>
                </tr>
            </thead>
            <tbody id="brg">
                @foreach ($brg as $key => $p)
                    <tr class="w-full border-b bg-white text-center uppercase text-black hover:bg-gray-50">
                        {{-- <form action="{{ route('updateQty') }}" method="POST">
                            @csrf --}}

                        <input type="hidden" name="barcode" id="barcode" value="{{ $p->barcode }}">
                        <input type="hidden" name="namaBarang" id="namaBarang" value="{{ $p->namaBarang }}">
                        <input type="hidden" name="hrgJual" id="hrgJual" value="{{ $p->hrgJual }}">
                        <input type="hidden" name="hrgBeli" id="hrgBeli" value="{{ $p->hrgBeli }}">
                        <input type="hidden" name="tgl_jual" id="tgl_jual" value="{{ date('Y-m-d') }}">
                        <input type="hidden" name="noFakturJualan" id="noFakturJualan" value="{{ $noFaktur }}">


                        <td class="items-center py-3 px-7 dark:text-white">{{ $key + 1 }}</td>
                        <td class="items-center py-3 px-7 dark:text-white">{{ $p->barcode }}</td>
                        <td class="items-center py-3 px-12 dark:text-white">{{ $p->namaBarang }}</td>
                        <td class="items-center py-3 px-7 dark:text-white">
                            <input type="number"
                                class="block w-14 rounded-lg border border-gray-300 bg-gray-50 px-2.5 py-1 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="1" required="" min="1" value="1" name="jmlhJual" id="jmlhJual">
                        </td>
                        <td class="items-center py-3 px-7 dark:text-white">{{ $p->hrgJual }}</td>
                        <td>
                            <button type="submit" id="btnTambah"
                                class="rounded-md bg-green-500 p-1 text-white hover:bg-green-700">Tambah</button>
                            {{-- </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-3 mb-5">
        {{ $brg->links() }}
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/flowbite.js') }}"></script>
    {{-- <script defer src="{{ asset('assets/fontawesome/js/all.min.js') }}"></script> --}}
    <script src="/js/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function(e) {

            $(document).on("click", '#btnTambah', function(e) {
                e.preventDefault();

                var data = {
                    'noFakturJualan': $('#noFakturJualan').val(),
                    'barcode': $('#barcode').val(),
                    'namaBarang': $('#namaBarang').val(),
                    'jmlhJual': $('#jmlhJual').val(),
                    'hrgJual': $('#hrgJual').val(),
                    'hrgBeli': $('#hrgBeli').val()
                }
                var stok = {
                    'stok': $('#stok').val(),
                }
                console.log(data);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('transaksi.store') }}",
                    data: data,
                    dataType: "json",
                    success: function(response) {
                        setTimeout(function() { // wait for 5 secs(2)
                            location.reload(true); // then reload the page.(3)
                        }, 100);
                        $('#success').html('');
                        $('#success').append('<div id="alert-3" class="mb-4 flex rounded-lg bg-green-100 p-4 dark:bg-green-200" role="alert">\
                                  <svg aria-hidden="true" class="h-5 w-5 flex-shrink-0 text-green-700 dark:text-green-800" fill="currentColor"\
                                      viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\
                                      <path fill-rule="evenodd"\
                                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"\
                                          clip-rule="evenodd"></path>\
                                  </svg>\
                                  <span class="sr-only">Info</span>\
                                  <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">\
                                      Berhasil ditambah\
                                  </div>\
                                  <button type="button"\
                                      class="-mx-1.5 -my-1.5 ml-auto inline-flex h-8 w-8 rounded-lg bg-green-100 p-1.5 text-green-500 hover:bg-green-200 focus:ring-2 focus:ring-green-400 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"\
                                      data-dismiss-target="#alert-3" aria-label="Close">\
                                      <span class="sr-only">Close</span>\
                                      <svg aria-hidden="true" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20"\
                                          xmlns="http://www.w3.org/2000/svg">\
                                          <path fill-rule="evenodd"\
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"\
                                              clip-rule="evenodd"></path>\
                                      </svg>\
                                  </button>\
                              </div>')
                        $('#search').focus();
                    }
                })
            });


        }); //end document
    </script>
@endsection
