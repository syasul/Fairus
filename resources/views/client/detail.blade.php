@extends('base')
@section('head')
<title>Alana Regency Gunung Sari</title>
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide{
        -ms-overflow-style: none;
            /* IE and Edge */
        scrollbar-width: none;
            /* Firefox */
    }
</style>
@endsection
@section('body')
<!-- hero section -->
<section class="p-5 ">
    <div class="relative overflow-hidden bg-secondaryGrey bg-blend-multiply rounded-lg lg:min-h-36">
        <div class=" container relative px-4 pt-24 pb-36 md:pt-32 md:pb-16 lg:pt-40 lg:pb-24">
            <div class="relative flex flex-col items-center justify-center md:flex-row md:justify-between z-30">
                <div class="md:w-1/2 lg:w-2/5">
                    <h1 class="text-4xl lg:text-6xl font-bold text-lightGrey uppercase">
                        Alana
                        Regency Gunung Sari
                    </h1>
                    <p class="mt-6 text-md lg:text-lg text-lightGrey">Rumah Mewah mulai 700 Jutaan, Angsuran 3
                        Jutaan.
                        Lokasi strategis, hanya 1 menit dari Jalan Wiyung Surabaya Selatan. Bebas macet, hati lega!
                        FREE
                        BPHTB, PPN, AJB, BBN, Biaya KPR.</p>
                    <a href="#"
                        class="mt-8 inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg  transition duration-300 ease-in-out">
                        Hubungi Sekarang
                    </a>
                </div>
            </div>



        </div>
        <div
            class="absolute -right-36 z-20 -bottom-8 translate-x-2/4 md:translate-x-44 mt-10 md:mt-0 md:w-1/2 lg:w-3/5 -z-1">
            <img src="{{ asset('images/home-jumbo.png')}}" alt="Alana Regency Gunung Sari"
                class="size-5/12 md:size-8/12 lg:size-2/3">
        </div>
        <div class="absolute inset-0 z-10 flex justify-end">
            <img src="{{ asset('images/texture1.png')}}" alt="" class="absolute -top-10 -right-1/2 scale-75 ">
            <img src="{{ asset('images/texture1.png')}}" alt=""
                class="absolute -bottom-1/3 -left-1/3 lg:-bottom-1/4 lg:-left-1/4 scale-75">
        </div>
    </div>
</section>

<!-- section-2 -->
<section class="pt-10 pb-10">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full self-center px-auto px-4 lg:w-1/2 lg:self-center">
                <div class="mt-10 md:mt-0 md:ml-10 lg:ml-0">
                    <img src="{{ asset('images/section-2-p2.png')}}" alt="" class="rounded-lg">
                </div>
            </div>
            <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:w-1/2 lg:self-start">
                <h4 class="text-semibold text-primaryGrey font-lg">ALANA GUNUNG SARI</h4>
                <h1 class="font-medium text-3xl lg:text-4xl">Pilihan ideal, Untuk hunian ideal </h1>
                <p class="text-base text-dark mt-2 leading-relaxed lg:text-lg">Perumahan Alana Regency
                    Gunung Sari,
                    dikembangkan oleh PT. Tumerus Jaya Propertindo, adalah perumahan mewah di Surabaya Selatan.
                    Lokasinya strategis, hanya 600 meter dari Jalan Besar Wiyung, dengan pilihan rumah 1 dan 2
                    lantai. Fasilitas lengkap meliputi kolam renang, one gate card system, kids playground, taman,
                    aula, mushola, keamanan 24 jam, estate management, CCTV 24 jam, dan minimarket terdekat. Promo
                    menarik termasuk rumah baru free semua biaya (BPHTB, SHGB, AJB, BBN, Peralihan 1x, PPN, PDAM,
                    pagar, tandon bawah air), kemudahan cicilan, dan cukup dengan DP 5 juta, langsung pilih unit
                    rumahnya. Hubungi marketing untuk informasi promo terbaru setiap bulan. Rumah dijual di Surabaya
                    Selatan.
                </p>
                <a href="#"
                    class="mt-8 inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg transition duration-300 ease-in-out">
                    Hubungi Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<!-- section-3 -->
<section class="pt-36 pb-32">
    <div class="container mx-auto">
        <div class="flex flex-wrap">
            <div class="w-full justify-content-center self-center md:w-1/2 relative">

                <img src="{{ asset('images/section-3-layer-1.png')}}"
                    class="absolute rounded-xl border-4 top-10 left-10 lg:left-20 lg:top-20 z-20 translate-x-0 scale-x-75 scale-y-75 border-white">
                <img src="{{ asset('images/section-3-layer-2.png')}}"
                    class=" rounded-xl -z-10 scale-x-75 scale-y-75 top-0 left-0">
            </div>

            <div class="w-full self-center pl-6 pr-4 mt-10 lg:mt-0 md:w-1/2" id="deskripsi">
                <h4 class="text-primaryGrey font-semibold text-lg uppercase">Sebab
                    Kenapa?.
                    Pilih di Alana
                    Gunung
                    Sari</h4>
                <h1 class="font-medium text-3xl lg:text-4xl">Alasan Alana Regency Gunung Sari</h1>
                <div class="flex flex-wrap p-1 mt-5">
                    <div class="w-1/2">
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Developer Berpengalaman</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Developer Terpercaya</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Area Berkembang</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Harga Terbaik</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Cicilan Termudah</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Lokasi Strategis</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Developer Berpengalaman</h5>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Investasi Menjanjikan</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Desain Bangunan Modern</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Pilihan, Tipe Rumah Bervariasi</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Fast Response</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Banyak Prestasi</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Promo Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Legalitas Aman</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-medium text-primaryGrey">Pembangunan Tepat Waktu</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section 4 -->
<section class="pt-36 pb-32 bg-lightGrey">
    <div class="container">
        <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:self-start">
            <h4 class="text-lg font-semibold text-primaryGrey text-center w-full">Fasilitas Yang
                Lengkap, Jadi
                Bikin
                Senengin di Perumahannya</h4>
            <h1 class="font-medium text-3xl lg:text-4xl text-center uppercase md:text-center mb-10">Fasilitas
                Perumahan
                Alana Regency
                Gunung Sari
            </h1>
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar scrollbar-hide">
                <div class="flex flex-nowrap snap-x">
                    <!-- Card 1 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/300" alt="Image"
                            class="object-cover w-44 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 1
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/301" alt="Image"
                            class="object-cover w-44 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 2
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/302" alt="Image"
                            class="object-cover w-44 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 3
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/303" alt="Image"
                            class="object-cover w-44 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 4
                        </div>
                    </div>
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/304" alt="Image"
                            class="object-cover w-44 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 4
                        </div>
                    </div>
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/305" alt="Image"
                            class="object-cover w-44 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 4
                        </div>
                    </div>
                    <!-- Tambahkan card lainnya di sini -->
                </div>
            </div>
            <div class="flex justify-center">
                <a href="#"
                    class="mx-auto align-center mt-8 justify-center inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg transition duration-300 ease-in-out">
                    Hubungi Sekarang
                </a>
            </div>
        </div>
    </div>
</section>


<!-- section 5 -->
<section class="pt-36 pb-36">
    <div class="container">
        <div class="flex flex-col lg:flex-row">
            <div class=" w-full self-center px-4 mt-10 lg:mt-0 md:w-2/3 lg:w-2/3" id="deskripsi">
                <h4 class="text-lg font-semibold text-primaryGrey">Alana Regency Gunung Sari
                    Sari</h4>
                <h1 class="font-medium text-3xl lg:text-4xl">Akses Auto Praktis, Akses Bikin Kemanapun Jadi, Hemat
                    Waktunya</h1>
                <div class="flex flex-wrap-reverse p-1 mt-5">
                    <div class="w-1/2">
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">1 Menit dari Wiyung Surabaya</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">1 Menit dari Minimarket Alfamart
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">1 Menit daro Minimarket Indomaret
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">1 Menit dari Pasar Wiyung</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">0 Jalan Provinsi 20 Meter Wiyung
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">15 Menit dari Pakuwon Trade Center
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">15 Menit Sutos Mall Surabaya</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">17 Menit Mall Royal Surabaya</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">20 Menit ke Juanda</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">20 Menit ke RSAL Surabaya</h5>
                        </div>
                    </div>
                    <div class="w-1/2">
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">20 Menit ke Rumah Sakit Siti
                                Khadijah
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">20 Menit dari Pasar Sepanjang
                                Toserba
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">5 Menit dari Pintu Tol Gunung Sari
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">15 Menit dari Rumah Sakit Wiyung
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">15 Menit dari National Hospital</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">15 Menit dari UNESA Surabaya</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">20 Menit dari Terminal Bus
                                Bungurasig
                            </h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">25 Menit dari Stasiun Kereta Api
                                Gubeng</h5>
                        </div>
                        <div class="manfaat-1 flex items-center mb-2">
                            <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-sm text-primaryGrey lg:text-lg">1 Menit dari Pasar Selalu Ramai
                                Hidup
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full items-end self-end md:w-1/3 lg:w-1/3 ">

                <img src="{{ asset('images/map.png')}}"
                    class=" rounded-xl border-4 top-10 left-10 lg:left-20 lg:top-20 z-20 translate-x-0 scale-x-75 scale-y-75 border-white">
            </div>


        </div>
        <div class="flex justify-center">
            <a href="#"
                class="mx-auto align-center mt-8 justify-center inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg transition duration-300 ease-in-out">
                Hubungi Sekarang
            </a>
        </div>
    </div>
</section>

<!-- section 6 -->
<section class="pt-36 pb-36 bg-lightGrey">
    <div class="container">
        <div class="w-full self-center mt-10 px-4 lg:mt-0">
            <h4 class="text-lg font-semibold text-primaryGrey w-full text-center">
                Berbagai Tipe Rumah Impian, dengan Desain Idaman, Bikin Nyamanin
            </h4>
            <h1 class="font-medium text-3xl lg:text-4xl text-center">
                Tipe Rumah di Alana Regency Gunung Sari
            </h1>

            <div class="content-home pt-10 pb-10 text-center">
                <h2
                    class="border-2 w-1/2 lg:w-1/6 mx-auto pt-1 pb-1 rounded-full border-black bg-white font-semibold text-md">
                    Rumah 1 Lantai
                </h2>
                <div
                    class="card-home w-full pr-3 mt-10 px-4 flex flex-col lg:flex-row items-center justify-center gap-4">
                    <div class="w-full lg:w-1/3">
                        <img src="{{ asset('images/model-rumah.png')}}" alt="" class="rounded-xl mx-auto">
                    </div>
                    <div class="w-full lg:w-1/3 flex flex-col items-start gap-y-0">
                        <div class="text-xl font-bold text-neutral-950">
                            RUMAH TIPE LB 30 / LT 50 (5x10)
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-luas-b.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-luas-t.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-dimensi-r.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-kt.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-km.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-carpot.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="pt-5">
                            <button
                                class="rounded-[10px] bg-[lightsteelblue] px-5 py-2.5 text-[15px] font-medium text-white">
                                Info Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-home pt-10 pb-10 text-center">
                <h2
                    class="border-2 w-1/2 lg:w-1/6 mx-auto pt-1 pb-1 rounded-full border-black bg-white font-semibold text-md">
                    Rumah 2 Lantai
                </h2>
                <div
                    class="card-home w-full pr-3 mt-10 px-4 flex flex-col lg:flex-row items-center justify-center gap-4">
                    <div class="w-full lg:w-1/3">
                        <img src="{{ asset('images/model-rumah.png')}}" alt="" class="rounded-xl mx-auto">
                    </div>
                    <div class="w-full lg:w-1/3 flex flex-col items-start gap-y-0">
                        <div class="text-xl font-bold text-neutral-950">
                            RUMAH TIPE LB 30 / LT 50 (5x10)
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-luas-b.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-luas-t.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-dimensi-r.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-kt.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-km.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="manfaat-1 flex items-center">
                            <img src="{{ asset('images/ic-carpot.png')}}" alt="" class="inline-block mr-2 scale-75">
                            <h5 class="text-md text-primaryGrey font-medium">Fasilitas Terlengkap</h5>
                        </div>
                        <div class="pt-5">
                            <button
                                class="rounded-[10px] bg-[lightsteelblue] px-5 py-2.5 text-[15px] font-medium text-white">
                                Info Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section 7 -->
<section class="pt-36 pb-36">
    <div class="container">

        <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:self-start">
            <h4 class="text-lg font-semibold text-primaryGrey w-full text-center">
                Dapetin Segala Promonya, Sekarang Juga Jangan Sampai Ketinggalan Moemen Terindah
            </h4>
            <h1 class="font-medium text-3xl lg:text-4xl text-center">
                Skema Pembayaran Alana Regency Gunung Sari
            </h1>

            <div class="card-pembayaran flex flex-wrap gap-5 gap-x-5 lg:gap-y-6 mt-10 justify-center">
                <div
                    class="card-1 w-full md:w-64 max-h-72 p-3 shadow-custom-shadow rounded-xl flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/ic-dollar.png')}}" alt="" class="scale-75">
                    <h4 class="font-semibold text-primaryGrey mt-3 text-xl">CASH</h4>
                    <p class="text-base font-medium">Pembayaran 75% di Bulan Pertama, 25% Waktu Serah Terima Unit
                    </p>
                </div>
                <div
                    class="card-1 w-full md:w-64 max-h-72 p-3 shadow-custom-shadow rounded-xl flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/ic_invoice.png')}}" alt="" class="scale-75">
                    <h4 class="font-semibold text-primaryGrey mt-3 text-xl">InHouse 12X</h4>
                    <p class="text-base font-medium">Angsuran Tunai Bertahap, Langsung ke Developer</p>
                </div>
                <div
                    class="card-1 w-full md:w-64 max-h-72 p-3 shadow-custom-shadow rounded-xl flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('images/ic-deal.png')}}" alt="" class="scale-75">
                    <h4 class="font-semibold text-primaryGrey mt-3 text-xl">KPR DP 0%</h4>
                    <p class="text-base font-medium">Dp 0% , Cukup NUP 5 Juta Langsung Akad Rumahnya Instant
                        Approval Bank*</p>
                </div>
            </div>

            <div class="card-keuntungan flex flex-wrap  lg:gap-x-12  mt-10 justify-center">
                <div
                    class="card-1 w-full rounded-xl flex flex-col md:w-64 lg:w-1/6">
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                </div>
                <div
                    class="card-1 w-full rounded-xl flex flex-col md:w-64 lg:w-1/6">
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                </div>
                <div
                    class="card-1 w-full rounded-xl flex flex-col md:w-64 lg:w-1/6">
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                    <div class="manfaat-1 flex items-start mb-2">
                        <img src="{{ asset('images/check.png')}}" alt="" class="inline-block mr-2 scale-75">
                        <h5 class="text-medium text-primaryGrey">1 Menit dari Wiyung Surabaya</h5>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- section 8 -->
<section class="pt-36 pb-32 bg-lightGrey">
    <div class="container">
        <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:self-start">
            <h1 class="font-medium text-3xl lg:text-4xl text-center mb-10">Terimakasih Sahabat Alana, Beberapa
                Penghargaan dari Bank
            </h1>
            <div class="flex overflow-x-scroll pb-10 hide-scroll-bar scrollbar-hide">
                <div class="flex flex-nowrap ">
                    <!-- Card 1 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/300" alt="Image"
                            class="object-cover max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 1
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/301" alt="Image"
                            class="object-cover max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 2
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/302" alt="Image"
                            class="object-cover max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 3
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/303" alt="Image"
                            class="object-cover max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 4
                        </div>
                    </div>
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/304" alt="Image"
                            class="object-cover max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 4
                        </div>
                    </div>
                    <div class="inline-block px-3 relative snap-start">
                        <img src="https://picsum.photos/200/305" alt="Image"
                            class="object-cover max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                        <div
                            class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                            Fasilitas 4
                        </div>
                    </div>
                    <!-- Tambahkan card lainnya di sini -->
                </div>

            </div>

        </div>

    </div>
</section>

<!-- section 9 -->
<section class="pb-36 pt-36">
    <div class="container">
        <div class="w-full self-center px-4 mt-10 lg:mt-0" id="deskripsi">
            <h4 class="text-lg font-semibold text-primaryGrey text-center">Gallery, Akad
                Perumahan Alana
                Regency Gunung
                Sari</h4>
            <h1 class="font-medium text-3xl text-center lg:text-4xl mb-10">Siap, Sampai Serah Terima, Unit Rumah
                Barunya
            </h1>
            <div class="columns-1 md:columns-3 xl:columns-3 gap-7 ">
                <div class="break-inside-avoid mb-8">
                    <img class="h-auto max-w-full rounded-lg" src="https://pagedone.io/asset/uploads/1688031162.jpg"
                        alt="Gallery image" />
                </div>
                <div class=" break-inside-avoid mb-8">
                    <img class="h-auto max-w-full rounded-lg" src="https://pagedone.io/asset/uploads/1688031232.jpg"
                        alt="Gallery image" />
                </div>
                <div class=" break-inside-avoid mb-8">
                    <img class="h-auto max-w-full rounded-lg" src="https://pagedone.io/asset/uploads/1688031357.jpg"
                        alt="Gallery image" />
                </div>
                <div class=" break-inside-avoid mb-8">
                    <img class="h-auto max-w-full rounded-lg" src="https://pagedone.io/asset/uploads/1688031375.jpg"
                        alt="Gallery image" />
                </div>
                <div class=" break-inside-avoid mb-8">
                    <img class="h-auto max-w-full rounded-lg" src="https://pagedone.io/asset/uploads/1688031396.jpg"
                        alt="Gallery image" />
                </div>
                <div class=" break-inside-avoid mb-8">
                    <img class="h-auto max-w-full rounded-lg" src="https://pagedone.io/asset/uploads/1688031414.png"
                        alt="Gallery image" />
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/jumbotronDetailPage.js')}}"></script>    
@endsection