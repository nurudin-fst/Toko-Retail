hai
<table>
    <tr>
        <th>Apa</th>
    </tr>
    <tr>
        @foreach ($laporan as $l)
            <td>{{ $l->barcode }}</td>
        @endforeach
    </tr>
</table>
