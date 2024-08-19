<table class="w-full shadow-lg" id="table-penjualan table-detail" id="tabelKasir">
    <thead class="rounded-lg bg-[#bb1724] text-white">
        <tr>
            <th>#</th>
            <th>Barcode</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>harga jual</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($barang as $d)
            <th>{{ $key + 1 }}</th>
            <td>{{ $d->barcode }}</td>
            <td>{{ $d->namaBarang }}</td>
            <td>{{ $d->jmlhJual }}</td>
            <td>{{ $d->hrgJual }}</td>
        @endforeach
    </tbody>
</table>
