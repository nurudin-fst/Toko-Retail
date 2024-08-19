@extends('admin.layouts.template')
@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="m-5">
            <table class="w-full rounded-lg bg-[#bb1724] text-left text-sm text-white" id="table-datatables">
                <thead class="bg-[#bb1724] text-center text-xs uppercase text-white dark:bg-gray-700">
                    <tr>
                        <th scope="col" class="py-2 px-6">
                            #
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Nomor Faktur Beli
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Nama Suppliler
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Tanggal Transaksi
                        </th>
                        <th scope="col" class="py-2 px-6">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $d)
                        <tr class="md:boder-b border-b bg-white text-black hover:bg-gray-100">
                            <th class="m-auto w-auto border text-center">
                                {{ $key + 1 }}
                            </th>
                            <td class="text-center">
                                {{ $d->noFakturBeli }}
                            </td>
                            <td class="text-center">
                                {{ $d->suplier->namaSupplier }}
                            </td>
                            <td class="text-center">
                                {{ $d->tglBeli }}
                            </td>
                            <td class="flex items-center py-2 px-1 text-left">
                                {{-- <a href="#"
                                    class="mx-2 w-full rounded-lg bg-blue-700 p-2 text-sm font-bold text-white hover:bg-blue-800">Detail</a> --}}
                                <form action="{{ route('exportPdfHistori') }}" method="get">
                                    @csrf
                                    <input type="hidden" value="{{ $d->noFakturBeli }}" name="noFakturBeli">
                                    <button class="mx-2 rounded-lg bg-red-600 p-2 text-sm text-white hover:bg-red-700">
                                        <i class="fa fa-download"></i> PDF</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
