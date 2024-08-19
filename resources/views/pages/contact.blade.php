@extends('layouts.layout-main')
@section('content')
    <div class="container">
        <div class="bg-white flex flex-wrap lg:justify-between">
            <div class="w-full lg:w-1/2 xl:w-6/12 px-4 lg:p-7">
                <div class="max-w-[570px] mb-12 lg:mb-0">
                    <div class="flex mt-8 max-w-[370px] w-full">
                        <div
                            class="max-w-[60px] w-full h-[60px] flex items-center justify-center mr-6 overflow-hidden bg-primary bg-opacity-5 text-primary rounded">
                            <span class="text-4xl">
                                <i class="fa-solid fa-school"></i>
                            </span>
                        </div>
                        <div class="w-full">
                            <h4 class="font-bold text-dark text-xl mb-1">Website Sekolah</h4>
                            <p class="text-base text-body-color underline">
                                <a href="https://smkn1purbalingga.sch.id/" target="_blank" rel="noopener noreferrer">SMKN 1
                                    Purbalingga</a>
                            </p>
                        </div>
                    </div>
                    <div class="flex mt-8 max-w-[370px] w-full">
                        <div
                            class="max-w-[60px] w-full h-[60px] flex items-center justify-center mr-6 overflow-hidden bg-primary bg-opacity-5 text-primary rounded">
                            <span class="text-4xl">
                                <i class="fa-solid fa-phone"></i>
                            </span>
                        </div>
                        <div class="w-full">
                            <h4 class="font-bold text-dark text-xl mb-1">Telepon</h4>
                            <a href="tel:+6281312008910" class="text-base text-body-color">+62 813-1200-8910</a>
                        </div>
                    </div>
                    <div class="flex mt-8 max-w-[370px] w-full">
                        <div
                            class="max-w-[60px] w-full h-[60px] flex items-center justify-center mr-6 overflow-hidden bg-primary bg-opacity-5 text-primary rounded">
                            <span class="text-4xl">
                                <i class="fa-solid fa-shop"></i>
                            </span>
                        </div>
                        <div class="w-full">
                            <h4 class="font-bold text-dark text-xl mb-1">Lokasi</h4>
                            <p class="text-base text-body-color">Berada di sebelah SMK N 1 PURBALINGGA, Jl. Mayjend Sungkono
                                34 Kec. Kalimanah, Kab. Purbalingga</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2 xl:w-5/12 px-2 lg:p-5">
                <div class="rounded-lg shadow-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d989.1385594648513!2d109.34662842916646!3d-7.4037379996661254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65595c13abd09f%3A0x51b0bd20258ce2a7!2ssmega%20mart!5e0!3m2!1sen!2sid!4v1661520189698!5m2!1sen!2sid"
                        width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
