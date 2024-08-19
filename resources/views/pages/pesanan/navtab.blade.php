<div
    class="border-b border-gray-200 text-center text-sm font-medium text-gray-500 dark:border-gray-700 dark:text-gray-400">
    <ul class="-mb-px flex flex-wrap justify-center">
        <li class="mr-2">
            <a href="/pesanan/diproses"
                class="{{ request()->is('pesanan/diproses') ? 'text-red-600 md:text-red-600 p-3' : 'md:text-black' }} inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300">Diproses</a>
        </li>
        {{-- <li class="mr-2">
            <a href="/pesanan/dikemas"
                class="{{ request()->is('pesanan/dikemas') ? 'text-red-600 md:text-red-600 p-3' : 'md:text-black' }} inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300"
                aria-current="page">Dikemas</a>
        </li>
        <li class="mr-2">
            <a href="/pesanan/dikirim"
                class="{{ request()->is('pesanan/dikirim') ? 'text-red-600 md:text-red-600 p-3' : 'md:text-black' }} inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300">Dikirim</a>
        </li> --}}
        <li class="mr-2">
            <a href="/pesanan/selesai"
                class="{{ request()->is('pesanan/selesai') ? 'text-red-600 md:text-red-600 p-3' : 'md:text-black' }} inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300">Selesai</a>
        </li>
        <li class="mr-2">
            <a href="/pesanan/dibatalkan"
                class="{{ request()->is('pesanan/dibatalkan') ? 'text-red-600 md:text-red-600 p-3' : 'md:text-black' }} inline-block rounded-t-lg border-b-2 border-transparent p-4 hover:border-gray-300 hover:text-gray-600 dark:hover:text-gray-300">Dibatalkan</a>
        </li>
    </ul>
</div>
