@extends('layouts.layout-main')
@section('content')
    <div
        class="mx-auto h-[200px] w-full max-w-screen-xl rounded-lg bg-black/[0.5] bg-[url('/assets/img/tampak-depan.jpg')] bg-cover bg-center bg-blend-multiply">
        <div class="flex items-start md:justify-center">
            <div class="my-[45%] ml-3 text-sm font-bold text-white xs:my-[30%] sm:my-[25%] md:my-3 md:ml-0 md:text-4xl">
                Smega Mart
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-5 w-full max-w-screen-xl">
        <article
            class="rounded-lg text-center text-black hover:border-r-8 hover:border-b-8 hover:border-[#bb1724] hover:bg-white hover:shadow-md">
            <div class="container items-center text-center">
                <i class="fa fa-quote-left"></i> <b>Smega Mart</b> adalah toko retail yang berada di
                lingkungan
                SMK N 1
                Purbalingga. Smega Mart menyediakan
                berbagai macam kebutuhan sehari-hari. Disini bukan hanya makanan saja yang diperjual belikan ada juga yang
                lain
                seperti sepatu dan alat tulis ada juga layanan pembelian pulsa. Smega Mart bekerja sama dengan Alfamart
                untuk membangun trafik ekonomi yang
                menjanjikan. Memberi kemudahan bagi masyarakat terdekat dan juga siswa siswi SMK N 1 Purbalingga. <i
                    class="fa fa-quote-right"></i><br>

            </div>
        </article>
    </div>

    <div class="container mx-auto mt-5 w-full max-w-screen-xl">
        <div class="m-3">
            <h1 class="m-5 mt-10 text-center text-2xl text-[#bb1724]">Area Pelayanan</h1>
            <div class="mx-auto -mt-4 h-[2px] w-[100px] bg-black"></div>
            <article class="mt-3">
                Kami menyediakan produk sehari-hari seperti makanan ringan, minuman, alat tulis dan lainnya.
                Kami melayani warga SMK N 1 PURBALINGGA dan masyarakat sekitar dan juga melayani secara online
                untuk wilayah Kabupaten Purbalingga khususnya kecamatan Kalimanah.
            </article>
        </div>
    </div>

    <h1 class="m-5 mt-10 text-center text-2xl text-[#bb1724]">Beberapa foto produk dari kami</h1>
    <div class="mx-auto -mt-4 h-[2px] w-[100px] bg-black"></div>
    <div
        class="container mx-auto mt-5 grid w-full max-w-screen-xl grid-cols-1 items-center gap-6 rounded-lg md:grid-cols-3">
        <div class="w-ful mx-auto h-auto items-center justify-center rounded-lg bg-white shadow-lg">
            <a class="glightbox"
                href="https://res.cloudinary.com/smegamart-softdev/image/upload/v1665195570/layer%20utama/IMG_20220926_103841_hxqhgl.jpg">
                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1665195570/layer%20utama/IMG_20220926_103841_hxqhgl.jpg"
                    alt="pd1"
                    class="h-auto w-[300px] rounded-lg border-4 border-[#bb1724] shadow-lg hover:border-gray-400">
            </a>
        </div>
        <div class="w-ful mx-auto h-auto items-center justify-center rounded-lg bg-white shadow-lg">
            <a class="glightbox"
                href="https://res.cloudinary.com/smegamart-softdev/image/upload/v1665045845/layer%20utama/IMG_20220926_111516_wb2lnk.jpg">
                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1665045845/layer%20utama/IMG_20220926_111516_wb2lnk.jpg"
                    alt="pd2"
                    class="h-auto w-[300px] rounded-lg border-4 border-[#bb1724] shadow-lg hover:border-gray-400">
            </a>
        </div>
        <div class="w-ful mx-auto h-auto items-center justify-center rounded-lg bg-white shadow-lg">
            <a class="glightbox"
                href="https://res.cloudinary.com/smegamart-softdev/image/upload/v1665045845/layer%20utama/IMG_20220926_102024_tq8xwk.jpg">
                <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1665045845/layer%20utama/IMG_20220926_102024_tq8xwk.jpg"
                    alt="pd3"
                    class="h-auto w-[300px] rounded-lg border-4 border-[#bb1724] shadow-lg hover:border-gray-400">
            </a>
        </div>
    </div>

    <div class="container mt-4 md:mt-6">
        <h1 class="m-5 mt-10 text-center text-2xl text-[#bb1724]">Kontak kami</h1>
        <div class="mx-auto -mt-4 h-[2px] w-[100px] bg-black"></div>

        <div class="mt-5 grid grid-cols-1 flex-wrap bg-white md:grid-cols-2">
            <div class="w-full px-4">
                <div class="mb-12 max-w-[570px]">
                    <div class="mt-8 flex w-full max-w-[370px]">
                        <div
                            class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5">
                            {{-- <svg width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path
              d="M21.8182 24H16.5584C15.3896 24 14.4156 23.0256 14.4156 21.8563V17.5688C14.4156 17.1401 14.0649 16.7893 13.6364 16.7893H10.4026C9.97403 16.7893 9.62338 17.1401 9.62338 17.5688V21.8173C9.62338 22.9866 8.64935 23.961 7.48052 23.961H2.14286C0.974026 23.961 0 22.9866 0 21.8173V8.21437C0 7.62972 0.311688 7.08404 0.818182 6.77223L11.1039 0.263094C11.6494 -0.0876979 12.3896 -0.0876979 12.9351 0.263094L23.2208 6.77223C23.7273 7.08404 24 7.62972 24 8.21437V21.7783C24 23.0256 23.026 24 21.8182 24ZM10.3636 15.4251H13.5974C14.7662 15.4251 15.7403 16.3995 15.7403 17.5688V21.8173C15.7403 22.246 16.0909 22.5968 16.5195 22.5968H21.8182C22.2468 22.5968 22.5974 22.246 22.5974 21.8173V8.25335C22.5974 8.13642 22.5195 8.01949 22.4416 7.94153L12.1948 1.4324C12.0779 1.35445 11.9221 1.35445 11.8442 1.4324L1.55844 7.94153C1.44156 8.01949 1.4026 8.13642 1.4026 8.25335V21.8563C1.4026 22.285 1.75325 22.6358 2.18182 22.6358H7.48052C7.90909 22.6358 8.25974 22.285 8.25974 21.8563V17.5688C8.22078 16.3995 9.19481 15.4251 10.3636 15.4251Z"
            />
          </svg> --}}
                            <span class="text-4xl">
                                <i class="fa-solid fa-school"></i>
                            </span>
                        </div>
                        <div class="w-full">
                            <h4 class="text-dark mb-1 text-xl font-bold">Website Sekolah</h4>
                            <p class="text-body-color text-base underline">
                                <a href="https://smkn1purbalingga.sch.id/" target="_blank" rel="noopener noreferrer">SMKN
                                    1
                                    Purbalingga</a>
                            </p>
                        </div>
                    </div>
                    <div class="mt-8 flex w-full max-w-[370px]">
                        <div
                            class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5">
                            {{-- <svg width="24" height="26" viewBox="0 0 24 26" class="fill-current"><path d="M22.6149 15.1386C22.5307 14.1704 21.7308 13.4968 20.7626 13.4968H2.82869C1.86042 13.4968 1.10265 14.2125 0.97636 15.1386L0.092295 23.9793C0.0501967 24.4845 0.21859 25.0317 0.555377 25.4106C0.892163 25.7895 1.39734 26 1.94462 26H21.6887C22.1939 26 22.6991 25.7895 23.078 25.4106C23.4148 25.0317 23.5832 24.5266 23.5411 23.9793L22.6149 15.1386ZM21.9413 24.4424C21.8992 24.4845 21.815 24.5687 21.6466 24.5687H1.94462C1.81833 24.5687 1.69203 24.4845 1.64993 24.4424C1.60783 24.4003 1.52364 24.3161 1.56574 24.1477L2.4498 15.2649C2.4498 15.0544 2.61819 14.9281 2.82869 14.9281H20.8047C21.0152 14.9281 21.1415 15.0544 21.1835 15.2649L22.0676 24.1477C22.0255 24.274 21.9834 24.4003 21.9413 24.4424Z"/><path d="M11.7965 16.7805C10.1547 16.7805 8.84961 18.0855 8.84961 19.7273C8.84961 21.3692 10.1547 22.6742 11.7965 22.6742C13.4383 22.6742 14.7434 21.3692 14.7434 19.7273C14.7434 18.0855 13.4383 16.7805 11.7965 16.7805ZM11.7965 21.2008C10.9966 21.2008 10.3231 20.5272 10.3231 19.7273C10.3231 18.9275 10.9966 18.2539 11.7965 18.2539C12.5964 18.2539 13.2699 18.9275 13.2699 19.7273C13.2699 20.5272 12.5964 21.2008 11.7965 21.2008Z"/><path d="M1.10265 7.85562C1.18684 9.70794 2.82868 10.4657 3.67064 10.4657H6.61752C6.65962 10.4657 6.65962 10.4657 6.65962 10.4657C7.92257 10.3815 9.18552 9.53955 9.18552 7.85562V6.84526C10.5748 6.84526 13.7742 6.84526 15.1635 6.84526V7.85562C15.1635 9.53955 16.4264 10.3815 17.6894 10.4657H17.7315H20.6363C21.4782 10.4657 23.1201 9.70794 23.2043 7.85562C23.2043 7.72932 23.2043 7.26624 23.2043 6.84526C23.2043 6.50847 23.2043 6.21378 23.2043 6.17169C23.2043 6.12959 23.2043 6.08749 23.2043 6.08749C23.078 4.90874 22.657 3.94047 21.9413 3.18271L21.8992 3.14061C20.8468 2.17235 19.5838 1.62507 18.6155 1.28828C15.795 0.193726 12.2587 0.193726 12.0903 0.193726C9.6065 0.235824 8.00677 0.446315 5.60716 1.28828C4.681 1.58297 3.41805 2.13025 2.36559 3.09851L2.3235 3.14061C1.60782 3.89838 1.18684 4.86664 1.06055 6.04539C1.06055 6.08749 1.06055 6.12959 1.06055 6.12959C1.06055 6.21378 1.06055 6.46637 1.06055 6.80316C1.10265 7.18204 1.10265 7.68722 1.10265 7.85562ZM3.37595 4.15097C4.21792 3.3932 5.27038 2.93012 6.15444 2.59333C8.34355 1.79346 9.7749 1.62507 12.1745 1.58297C12.3429 1.58297 15.6266 1.62507 18.1525 2.59333C19.0365 2.93012 20.089 3.3511 20.931 4.15097C21.394 4.65615 21.6887 5.32972 21.7729 6.12959C21.7729 6.25588 21.7729 6.46637 21.7729 6.80316C21.7729 7.22414 21.7729 7.68722 21.7729 7.81352C21.7308 8.78178 20.8047 8.99227 20.6784 8.99227H17.7736C17.3526 8.95017 16.679 8.78178 16.679 7.85562V6.12959C16.679 5.7928 16.4685 5.54021 16.1738 5.41392C15.9213 5.32972 8.55405 5.32972 8.30146 5.41392C8.00677 5.49811 7.79628 5.7928 7.79628 6.12959V7.85562C7.79628 8.78178 7.1227 8.95017 6.70172 8.99227H3.79694C3.67064 8.99227 2.74448 8.78178 2.70238 7.81352C2.70238 7.68722 2.70238 7.22414 2.70238 6.80316C2.70238 6.46637 2.70238 6.29798 2.70238 6.17169C2.61818 5.32972 2.91287 4.65615 3.37595 4.15097Z"/>
          </svg> --}}
                            <span class="text-4xl">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                        </div>
                        <div class="w-full">
                            <h4 class="text-dark mb-1 text-xl font-bold">Telepon</h4>
                            <a href="tel:+6281312008910" class="text-body-color text-base">+62 813-1200-8910</a>
                        </div>
                    </div>
                    <div class="mt-8 flex w-full max-w-[370px]">
                        <div
                            class="bg-primary text-primary mr-6 flex h-[60px] w-full max-w-[60px] items-center justify-center overflow-hidden rounded bg-opacity-5">
                            {{-- <svg width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path
              d="M21.8182 24H16.5584C15.3896 24 14.4156 23.0256 14.4156 21.8563V17.5688C14.4156 17.1401 14.0649 16.7893 13.6364 16.7893H10.4026C9.97403 16.7893 9.62338 17.1401 9.62338 17.5688V21.8173C9.62338 22.9866 8.64935 23.961 7.48052 23.961H2.14286C0.974026 23.961 0 22.9866 0 21.8173V8.21437C0 7.62972 0.311688 7.08404 0.818182 6.77223L11.1039 0.263094C11.6494 -0.0876979 12.3896 -0.0876979 12.9351 0.263094L23.2208 6.77223C23.7273 7.08404 24 7.62972 24 8.21437V21.7783C24 23.0256 23.026 24 21.8182 24ZM10.3636 15.4251H13.5974C14.7662 15.4251 15.7403 16.3995 15.7403 17.5688V21.8173C15.7403 22.246 16.0909 22.5968 16.5195 22.5968H21.8182C22.2468 22.5968 22.5974 22.246 22.5974 21.8173V8.25335C22.5974 8.13642 22.5195 8.01949 22.4416 7.94153L12.1948 1.4324C12.0779 1.35445 11.9221 1.35445 11.8442 1.4324L1.55844 7.94153C1.44156 8.01949 1.4026 8.13642 1.4026 8.25335V21.8563C1.4026 22.285 1.75325 22.6358 2.18182 22.6358H7.48052C7.90909 22.6358 8.25974 22.285 8.25974 21.8563V17.5688C8.22078 16.3995 9.19481 15.4251 10.3636 15.4251Z"
            />
          </svg> --}}
                            <span class="text-4xl">
                                <i class="fa-solid fa-shop"></i>
                            </span>
                        </div>
                        <div class="w-full">
                            <h4 class="text-dark mb-1 text-xl font-bold">Lokasi</h4>
                            <p class="text-body-color text-base">Berada di sebelah SMK N 1 PURBALINGGA, Jl. Mayjend
                                Sungkono
                                34 Kec. Kalimanah, Kab. Purbalingga</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-2">
                <div class="rounded-lg shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.1385594648513!2d109.34662842916646!3d-7.4037379996661254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65595c13abd09f%3A0x51b0bd20258ce2a7!2ssmega%20mart!5e0!3m2!1sen!2sid!4v1661520189698!5m2!1sen!2sid"
                        width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 border-b border-[#bb1724] bg-gray-100 p-3">
        <h1 class="m-5 mt-10 text-center text-2xl text-[#bb1724]">Mitra kami</h1>
        <div class="mx-auto -mt-4 h-[2px] w-[100px] bg-black"></div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
            <div class="mx-auto my-5 flex items-center justify-center">
                <a target="_blank" href="https://alfamart.co.id/">
                    {{-- <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663380858/layer%20utama/alfamart_v1bsvp.png"
                        alt="" class="h-auto w-20 md:w-40"> --}}
                    <img src="{{ asset('assets/img/alfamart.png') }}" alt="alfamart" class="h-auto w-20 md:w-40">
                </a>
            </div>
            <div class="mx-auto my-5">
                <a target="_blank" href="https://smkn1purbalingga.sch.id/">
                    {{-- <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1663380856/layer%20utama/smk_wgvroa.png"
                        alt="" class="h-auto w-20 md:w-40"> --}}
                    <img src="{{ asset('assets/img/smk.png') }}" alt="smega" class="h-auto w-20 md:w-40">
                </a>
            </div>
            <div class="mx-auto my-5">
                <a target="_blank" href="https://softdev.akriliklasercutting.com">
                    {{-- <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1664866996/layer%20utama/softdev_rbrfzu.png"
                      alt="" class="mt-3 h-auto w-20 md:w-40"> --}}
                    <img src="{{ asset('assets/img/softdev.png') }}" alt="sofdevcom" class="mt-3 h-auto w-20 md:w-40">
                </a>
            </div>
            <div class="mx-auto my-5">
                <a target="_blank" href="https://akriliklasercutting.com">
                    {{-- <img src="https://res.cloudinary.com/smegamart-softdev/image/upload/v1667960987/layer%20utama/akrilik_nlbwcy.png"
                        alt="" class="mt-3 h-auto w-20 md:w-40"> --}}
                    <img src="{{ asset('assets/img/akrilik.png') }}" alt="akrilk" class="mt-3 h-auto w-20 md:w-40">
                </a>
            </div>
        </div>
    </div>
@endsection
