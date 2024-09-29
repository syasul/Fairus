@extends('base')
@section('head')
<title>Alana Regency Gunung Sari</title>
<link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">
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

    .scroll-container {
    overflow-x: auto;
    white-space: nowrap; /* Prevent content from wrapping to the next line */
    width: 100%; /* Ensure it takes full width */
}

.scroll-content {
    display: inline-flex; /* To keep items in a row */
}

.hide-scroll-bar::-webkit-scrollbar {
    display: none; /* For WebKit browsers */
}

.scroll-container {
    -ms-overflow-style: none;  /* Internet Explorer and Edge */
    scrollbar-width: none;  /* Firefox */
}

</style>
@endsection
@section('body')

<!-- WhatsApp Button -->
<a href="https://wa.me/c/6281233579295" target="_blank" 
   class="fixed bottom-5 right-5 bg-primaryGrey hover:bg-primaryGrey text-white rounded-full w-20 h-20 flex items-center justify-center shadow-lg transition-transform transform">
   <i class="ri-whatsapp-line text-4xl"></i>
</a>

<!-- hero section -->
<section class="p-5 ">
    <div class="relative overflow-hidden bg-secondaryGrey bg-blend-multiply rounded-lg lg:min-h-36">
        <div class=" container relative px-4 pt-24 pb-36 md:pt-32 md:pb-16 lg:pt-40 lg:pb-24">
            <div class="relative flex flex-col items-center justify-center md:flex-row md:justify-between z-30">
                <div class="md:w-1/2 lg:w-2/5">
                    <h1 class="text-4xl lg:text-6xl font-bold text-lightGrey uppercase">
                        {{ $perumahans->nama_perumahan }}
                    </h1>
                    <p class="mt-6 text-md lg:text-lg text-lightGrey">{{ $perumahans->deskripsi_singkat }}</p>
                    <a href="https://wa.me/c/6281233579295"
                        class="mt-8 inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg  transition duration-300 ease-in-out">
                        Hubungi Sekarang
                    </a>
                </div>
            </div>
        </div>
        <div
            class="absolute -right-36 z-20 -bottom-8 translate-x-2/4 md:translate-x-44 mt-10 md:mt-0 md:w-1/2 lg:w-3/5 -z-1">
            <img src="{{ asset('storage/Perumahan/' . $perumahans->gambar_jumbotron)}}" alt="Alana Regency Gunung Sari"
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
<section class="pt-36 pb-36">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full self-center px-auto px-4 lg:w-1/2 lg:self-center">
                <div class="mt-10 md:mt-0 md:ml-10 lg:ml-0">
                    <img src="{{ asset('storage/Perumahan/' . $perumahans->about_perumahan_image)}}" alt="" class="rounded-lg">
                </div>
            </div>
            <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:w-1/2 lg:self-start">
                <h4 class="text-semibold text-primaryGrey font-lg">{{ $perumahans->nama_perumahan }}</h4>
                <h1 class="font-medium text-3xl lg:text-4xl">{{ $perumahans->about_perumahan_sub_title }}</h1>
                <p class="text-base text-dark mt-2 leading-relaxed lg:text-lg">{{ $perumahans->about_perumahan_content }}
                </p>
                <a href="https://wa.me/c/6281233579295"
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

                <img src="{{ asset('storage/Perumahan/' . $perumahans->about_perumahan_image1 )}}"
                    class="absolute rounded-xl border-4 top-10 left-10 lg:left-20 lg:top-20 z-20 translate-x-0 scale-x-75 scale-y-75 border-white">
                <img src="{{ asset('storage/Perumahan/' . $perumahans->about_perumahan_image2 )}}"
                    class=" rounded-xl -z-10 scale-x-75 scale-y-75 top-0 left-0">
            </div>

            <div class="w-full self-center pl-6 pr-4 mt-10 lg:mt-0 md:w-1/2" id="deskripsi">
                
                <h4 class="text-primaryGrey font-semibold text-lg uppercase">Sebab
                    Kenapa?.
                    Pilih di {{ $perumahans->nama_perumahan }}</h4>
                <h1 class="font-medium text-3xl lg:text-4xl">{{ $perumahans->nama_perumahan }}</h1>
                <div class="flex flex-wrap p-1 mt-5">
                    <div class="w-1/2">
                        @foreach($firstHalfAlasan as $item)
                            <div class="manfaat-1 flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                                <h5 class="text-medium text-primaryGrey">{{ $item }}</h5>
                            </div>
                        @endforeach
                    </div>
                    <div class="w-1/2">
                        @foreach($secondHalfAlasan as $item)
                            <div class="manfaat-1 flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                                <h5 class="text-medium text-primaryGrey">{{ $item }}</h5>
                            </div>
                        @endforeach
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
            <h4 class="text-lg font-semibold text-primaryGrey text-center w-full">{{ $perumahans->fasilitas_perumahan_title }}</h4>
            <h1 class="font-medium text-3xl lg:text-4xl text-center uppercase md:text-center mb-10">Fasilitas
                {{ $perumahans->nama_perumahan }}
            </h1>
            <div class="relative">
                <!-- Shadow kiri -->
                <div class="absolute left-0 top-0 h-full w-10 bg-gradient-to-r from-lightGrey to-transparent z-10"></div>
                <!-- Shadow kanan -->
                <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l from-lightGrey to-transparent z-10"></div>
                
                <div id="scroll-container-fasilitas" class="scroll-container flex overflow-x-scroll pb-10 hide-scroll-bar scrollbar-hide">
                    <div id="scroll-content-fasilitas" class="scroll-content flex flex-nowrap snap-x">
                        @foreach ($fasilitas as $fasilitas)
                        <div class="inline-block px-3 relative snap-start">
                            <img src="{{ asset('storage/Facility/' . $fasilitas->gambar_fasilitas) }}" alt="Image"
                                class="object-cover w-44 h-72 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                            <div class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                                {{ $fasilitas->nama_fasilitas }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <a href="https://wa.me/c/6281233579295"
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
                <h4 class="text-lg font-semibold text-primaryGrey">{{ $perumahans->nama_perumahan }}</h4>
                <h1 class="font-medium text-3xl lg:text-4xl">{{ $perumahans->maps_perumahan_sub_title }}</h1>
                <div class="flex flex-wrap-reverse p-1 mt-5">
                    <div class="w-1/2">
                        @foreach($firstHalfMaps as $item)
                            <div class="manfaat-1 flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                                <h5 class="text-medium text-primaryGrey">{{ $item }}</h5>
                            </div>
                        @endforeach
                    </div>
                    <div class="w-1/2">
                        @foreach($secondHalfMaps as $item)
                            <div class="manfaat-1 flex items-center mb-2">
                                <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                                <h5 class="text-medium text-primaryGrey">{{ $item }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-full items-end self-end md:w-1/3 lg:w-1/3 ">
                <img src="{{ asset('storage/Perumahan/' . $perumahans->maps_perumahan_image)}}"
                    class=" rounded-xl border-4 top-10 left-10 lg:left-20 lg:top-20 z-20 scale-150 scale-y-75 border-white">
            </div>


        </div>
        <div class="flex justify-center">
            <a href="https://wa.me/c/6281233579295"
                class="mx-auto align-center mt-8 justify-center inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg transition duration-300 ease-in-out">
                Hubungi Sekarang
            </a>
        </div>
    </div>
</section>

<!-- section 6 -->
<section class="pt-36 pb-36 bg-lightGrey">
    <div class="container">
        <div class="text-center mb-10">
            <h4 class="text-lg font-semibold text-primaryGrey w-full">
                Berbagai Tipe Rumah Impian, dengan Desain Idaman, Bikin Nyamanin
            </h4>
            <h1 class="font-medium text-3xl lg:text-4xl">
                Tipe Rumah di {{ $perumahans->nama_perumahan }}
            </h1>
        </div>

        <div class="flex flex-col gap-12">
            @if (!empty($rumahs) && $rumahs->count() > 0)
            <div class="flex flex-col gap-12">
                @foreach ($rumahs as $index => $rumah)
                    @php
                        // Cek apakah index genap atau ganjil
                        $isEven = $index % 2 == 0;
                    @endphp

                    <div class="flex flex-col {{ $isEven ? 'lg:flex-row' : 'lg:flex-row-reverse' }} items-start gap-8"> <!-- Ganti items-center dengan items-start -->
                        <!-- Bagian Gambar -->
                        <div class="w-full lg:w-1/2">
                            <img src="{{ asset('storage/Home/' . $rumah->gambar_rumah)}}" alt="Model Rumah" class="w-full h-60 object-cover rounded-lg">
                        </div>

                        <!-- Bagian Deskripsi -->
                        <div class="w-full lg:w-1/2 flex flex-col justify-start"> <!-- Ganti justify-center dengan justify-start -->
                            <h2 class="text-3xl font-semibold text-neutral-950 mb-3">{{ $rumah->tipe }}</h2>
                            <h5 class="text-sm mb-4">{{ $rumah->deskripsi }}</h5>
                            <a href="https://wa.me/c/6281233579295"
                                class="mt-8 inline-block px-7 py-3 w-1/3 bg-primaryGrey text-white font-medium rounded-lg transition duration-300 ease-in-out">
                                Hubungi Sekarang
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500">Tidak ada data rumah tersedia.</p>
        @endif

        </div>
    </div>
</section>

<!-- section 7 -->
<section class="pt-36 pb-36">
    <div class="container">

        <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:self-start">
            <h4 class="text-lg font-semibold text-primaryGrey w-full text-center">
                {{ $perumahans->pembayaran_perumahan_title }}
            </h4>
            <h1 class="font-medium text-3xl lg:text-4xl text-center">
                Skema Pembayaran {{ $perumahans->nama_perumahan }}
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

            <div class="card-pembayaran flex flex-wrap gap-5 gap-x-5 lg:gap-y-6 mt-10 justify-center">
                <div class="card-1 w-full md:w-64 max-h-72 px-5 flex flex-col items-start">
                    @foreach($firstPembayaran as $item)
                        <div class="flex items-start mb-2">
                        <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                        <h5>{{ $item }}</h5>
                        </div>
                    @endforeach
                </div>
                <div class="card-1 w-full md:w-64 max-h-72 px-5 flex flex-col items-start">
                    @foreach($secondPembayaran as $item)
                        <div class="flex items-start mb-2">
                        <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                        <h5>{{ $item }}</h5>
                        </div>
                    @endforeach
                </div>
                <div class="card-1 w-full md:w-64 max-h-72 px-5 flex flex-col items-start">
                    @foreach($thirdPembayaran as $item)
                        <div class="flex items-start mb-2">
                        <img src="{{ asset('images/check.png') }}" alt="" class="inline-block mr-2 scale-75">
                        <h5>{{ $item }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
            

        </div>
    </div>
</section>

<!-- section 8 -->
<section class="pt-36 pb-32 bg-lightGrey">
    <div class="container">
        <div class="w-full self-center mt-10 px-4 lg:mt-0 lg:self-start">
            <h1 class="font-medium text-3xl lg:text-4xl text-center mb-10">{{ $perumahans->penghargaan_title }}</h1>
            <div class="relative">
                <!-- Shadow kiri -->
                <div class="absolute left-0 top-0 h-full w-10 bg-gradient-to-r from-lightGrey to-transparent z-10"></div>
                <!-- Shadow kanan -->
                <div class="absolute right-0 top-0 h-full w-10 bg-gradient-to-l from-lightGrey to-transparent z-10"></div>

                <div id="scroll-container-penghargaan" class="scroll-container flex overflow-x-scroll pb-10 hide-scroll-bar scrollbar-hide">
                    <div id="scroll-content-penghargaan" class="scroll-content flex flex-nowrap snap-x">
                        @foreach ($penghargaans as $penghargaan)
                        <div class="inline-block px-3 relative snap-start">
                            <img src="{{ asset('storage/Achivement/' . $penghargaan->imageAchivement) }}" alt="Image"
                                class="object-cover w-44 h-72 max-w-xs overflow-hidden rounded-lg shadow-md bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out">
                            <div class="absolute bottom-5 left-8 rounded-tl-lg text-sm font-medium text-white z-20 lg:text-xl">
                                {{$penghargaan->nameAchivement}}
                            </div>
                        </div>
                        @endforeach
                    </div>
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
                Perumahan {{ $perumahans->nama_perumahan }}</h4>
            <h1 class="font-medium text-3xl text-center lg:text-4xl mb-10">Siap, Sampai Serah Terima, Unit Rumah
                Barunya
            </h1>
            <div class="columns-1 md:columns-3 xl:columns-3 gap-7 ">
                @foreach ($fotoPembelians as $index => $fotoPembelian)
                    <div class="break-inside-avoid mb-8 {{ $loop->index >= 6 ? 'hidden' : '' }}">
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/Payment/' . $fotoPembelian->foto_pembelian) }}"
                            alt="Gallery image" />
                    </div>    
                @endforeach
            </div>
            <div class="text-center mt-8">
                <button id="show-more" class="mx-auto align-center mt-8 justify-center inline-block px-7 py-3 bg-primaryGrey text-white font-medium rounded-lg transition duration-300 ease-in-out">
                    Lihat Semua
                </button>
            </div>
        </div>
    </div>
</section>


<script src="{{ asset('js/sliderCardJs.js') }}"></script>
<script src="{{ asset('js/showMore.js') }}"></script>
<script src="{{ asset('js/jumbotronDetailPage.js')}}"></script>    
@endsection