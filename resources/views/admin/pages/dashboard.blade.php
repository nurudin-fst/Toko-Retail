@extends('admin.layouts.template')
@section('content')
    <div class="justify-beetwen grid grid-cols-1 items-center gap-8 md:grid-cols-2 lg:grid-cols-4">
        <div class="flex max-w-sm items-center whitespace-nowrap rounded-md border-b bg-red-600 py-3 px-6 shadow-lg">
            <div class="h-10 w-10 rounded-full border-0 sm:h-20 sm:w-20 md:-ml-3 md:border-2">
                <i class="fa-solid fa-rupiah-sign items-center text-4xl text-white md:m-4 md:text-5xl"></i>
            </div>
            <div class="pl-3">
                <div class="text-base font-semibold text-white">Keuntungan Hari ini</div>
                <div class="block font-normal text-white">Rp. {{ number_format($today, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="flex max-w-sm items-center whitespace-nowrap rounded-md border-b bg-purple-600 py-3 px-6 shadow-lg">
            <div class="h-10 w-10 rounded-full border-0 sm:h-20 sm:w-20 md:-ml-3 md:border-2 md:border-white">
                <i class="fa-solid fa-rupiah-sign items-center text-4xl text-white md:m-4 md:text-5xl"></i>
            </div>
            <div class="pl-3">
                <div class="text-base font-semibold text-white">Keuntungan bulan ini</div>
                <div class="block font-normal text-white">Rp. {{ number_format($month, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="flex max-w-sm items-center whitespace-nowrap rounded-md border-b bg-blue-500 py-3 px-6 shadow-lg">
            <div class="h-10 w-10 rounded-full border-0 sm:h-20 sm:w-20 md:-ml-3 md:border-2">
                <i class="fa-solid fa-rupiah-sign items-center text-4xl text-white md:m-4 md:text-5xl"></i>
            </div>
            <div class="pl-3">
                <div class="text-base font-semibold text-white">Keuntungan Tahun ini</div>
                <div class="block font-normal text-white">Rp. {{ number_format($year, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="flex max-w-sm items-center whitespace-nowrap rounded-md border-b bg-green-500 py-3 px-6 shadow-lg">
            <div class="h-10 w-10 rounded-full border-0 sm:h-20 sm:w-20 md:-ml-3 md:border-2">
                <i class="fa-solid fa-box items-center text-4xl text-white md:m-4 md:text-5xl"></i>
            </div>
            <div class="pl-3">
                <div class="text-base font-semibold text-white">Total produk</div>
                <div class="block font-normal text-white">{{ $totalBarang }}</div>
            </div>
        </div>
    </div>
    {{-- <div class="mx-auto mt-5 grid gap-4 text-center sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3"> --}}
    <div class="mt-3 mb-3 h-[300px] max-w-2xl items-center rounded-md bg-gray-100 text-white shadow-lg">
        <div class="text-1xl rounded-t-md bg-purple-600 text-center text-white">
            <b class="mx-auto">Grafik Tahunan</b>
        </div>
        <div>
            <canvas id="tahunan" class="mb-3 h-[300px] max-w-2xl"></canvas>
        </div>
    </div>
    {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('tahunan');
        const tahunan = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec',
                ],
                datasets: [{
                    label: 'Data selama setahun ini',
                    data: [
                        {{ $yearData['jan'] }},
                        {{ $yearData['feb'] }},
                        {{ $yearData['mar'] }},
                        {{ $yearData['apr'] }},
                        {{ $yearData['mei'] }},
                        {{ $yearData['jun'] }},
                        {{ $yearData['jul'] }},
                        {{ $yearData['aug'] }},
                        {{ $yearData['sep'] }},
                        {{ $yearData['oct'] }},
                        {{ $yearData['nov'] }},
                        {{ $yearData['dec'] }},
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
