@extends('layouts.layout-main')
@section('content')
    <main class="container">
        <div class="mx-auto grid max-w-full grid-cols-1 lg:max-w-full lg:grid-cols-2 lg:gap-x-6">
            <div
                class="relative col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/75 via-black/0 p-3 sm:row-start-2 sm:bg-none sm:p-0 lg:row-start-1">
                <h1
                    class="mt-1 pl-2 font-oswald text-lg font-semibold text-white sm:text-slate-900 dark:sm:text-white md:pl-4 md:text-2xl lg:pl-6">
                    Smega Mart
                </h1>
            </div>
            <div
                class="col-start-1 col-end-3 row-start-1 grid gap-4 sm:mb-6 sm:grid-cols-4 lg:col-start-2 lg:row-span-6 lg:row-end-6 lg:mb-0 lg:gap-6">
                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663380859/layer%20utama/tampak-depan_rqgrhb.jpg"
                    alt="" class="h-60 w-full rounded-lg object-cover sm:col-span-2 sm:h-52 lg:col-span-full"
                    loading="lazy">
                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663380857/layer%20utama/tampak-depan-bak_tyoox4.jpg"
                    alt=""
                    class="hidden h-52 w-full rounded-lg object-cover sm:col-span-2 sm:block md:col-span-1 lg:col-span-2 lg:row-start-2 lg:h-32"
                    loading="lazy">
                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663382047/layer%20utama/5_nudaot.jpg"
                    alt=""
                    class="hidden h-52 w-full rounded-lg object-cover md:block lg:col-span-2 lg:row-start-2 lg:h-32"
                    loading="lazy">
            </div>
            <dl
                class="row-start-2 mt-4 flex items-center pl-4 text-xs font-medium sm:row-start-3 sm:mt-1 md:mt-2.5 md:pl-6 lg:row-start-2 lg:pl-8">
                <dd class="flex items-center">
                    <i class="fa fa-location-dot"></i>
                    <p class="ml-3">Berada di sebelah SMK N 1 PURBALINGGA, Jl. Mayjend Sungkono
                        34 Kec. Kalimanah, Kab. Purbalingga</p>
                </dd>
            </dl>
            <p
                class="col-start-1 mt-4 px-2 text-justify text-sm leading-6 sm:col-span-2 md:col-span-1 md:row-start-4 md:mt-2 md:px-4 lg:row-start-3 lg:px-6">
                <i class="fa fa-quote-left"></i> <b><i>Smega Mart</i></b> adalah toko retail yang ada di SMK N 1
                PURBALINGGA. Toko
                retail yang menyediakan berbagai layanan yang sangat lengkap seperti jual makanan ringan, sepatu dan
                lainnya. Toko yang berdiri untuk memenuhi kebutuhan masyarakat
                disekitar dan juga memenuhi kebutuhan siswa dan siswi SMK N 1 PURBALINGGA. Bekerjasama dengan Alfamart dan
                SMK N 1
                Purbalingga untuk membuat trafik ekonomi yang memadai banyak untuk kalangan. <i
                    class="fa fa-quote-right"></i>
            </p>
        </div>
    </main>

    <div class="mt-4 bg-white md:mt-6">
        <main class="container">
            <div class="mx-auto grid h-auto w-full grid-cols-1 items-center gap-4 py-2 md:grid-cols-2 md:py-3">
                <div>
                    <div id="controls-carousel" class="relative" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-52">
                            <!-- Item 1 -->
                            <div class="absolute inset-0 z-10 -translate-x-full transform transition-all duration-100 ease-in-out"
                                data-carousel-item="">
                                <img src="/assets/img/roma-wafello-chocoblast-depan.jpg"
                                    class="absolute top-1/2 left-1/2 block h-auto w-full -translate-x-1/2 -translate-y-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 2 -->
                            <div class="absolute inset-0 z-20 translate-x-0 transform transition-all duration-100 ease-in-out"
                                data-carousel-item="active">
                                <img src="/assets/img/roma-wafello-chocoblast-belakang.jpg"
                                    class="absolute top-1/2 left-1/2 block h-auto w-full -translate-x-1/2 -translate-y-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 3 -->
                            <div class="absolute inset-0 z-10 translate-x-full transform transition-all duration-100 ease-in-out"
                                data-carousel-item="">
                                <img src="/assets/img/roma-wafello-chocoblast-depan.jpg"
                                    class="absolute top-1/2 left-1/2 block h-auto w-full -translate-x-1/2 -translate-y-1/2"
                                    alt="...">
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="group absolute top-0 left-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                            data-carousel-prev="">
                            <span
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                                <svg aria-hidden="true" class="h-6 w-6 text-white dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7">
                                    </path>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="group absolute top-0 right-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                            data-carousel-next="">
                            <span
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                                <svg aria-hidden="true" class="h-6 w-6 text-white dark:text-gray-800" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="px-2 text-justify">
                    <i class="fa fa-quote-left"></i>
                    Kami memiliki produk yang lengkap dan pasti berkualitas. Kami menjual berbagai produk dari makanan
                    ringan /
                    jajanan, alat tulis dan lainnya. Pengecekan dan pemilihan produk yang tepat untuk menjamin produk
                    berkualitas dan aman tentunya. Bermacam produk ada untuk memenuhi kebutuhan masyarakat sektiar dengan
                    harga
                    yang pas dikantong. <i class="fa fa-quote-right"></i>
                </div>
            </div>
        </main>
    </div>
@endsection
