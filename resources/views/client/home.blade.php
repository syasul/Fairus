@extends('base')
@section('head')
    <title>Fairus</title>
    <style>
        input:focus {outline: none;}
    </style>

@endsection
@section('body')
    <!-- header-section -->
    <header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
        <div class="container">
            <div class="relative flex items-center justify-between">
                <div class="px-4">
                    <a href="#home" class="block py-6 text-lg font-bold text-primary"><img src="{{ asset('images/logo.png')}}"
                            alt="" srcset="" class="scale-50"></a>
                </div>
                <div class="flex items-center px-4">
                    <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
                        <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line transition duration-300 ease-in-out"></span>
                        <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                    </button>

                    <nav id="nav-menu"
                        class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg dark:shadow-slate-500 lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:shadow-none lg:dark:bg-transparent">
                        <ul class="block lg:flex">
                            <li class="group">
                                <a href="#home"
                                    class="mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary ">Beranda</a>
                            </li>
                            <li class="group">
                                <a href="#aboutMe"
                                    class="mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary ">Tentang
                                    Saya</a>
                            </li>
                            <li class="group">
                                <a href="#proyek"
                                    class="mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary">Proyek</a>
                            </li>
                            <li class="group">
                                <a href="#contact"
                                    class="mx-8 flex py-2 text-base font-medium text-dark group-hover:text-primary">Hubungi
                                    Saya</a>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- section Hero -->
    <section id="home" class="pt-36 bg-lightGrey pb-36">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2 lg:self-center" id="homeDisplay">
                    <h4 class="text-base font-dark md:text-xl uppercase">{{ $homeSection->content ?? 'Hi, I am Fairus Permatasari' }}</h4>
                    <h1 class="font-bold text-dark text-4xl lg:text-6xl" id="homeSubtitle">{{ $homeSection->subcontent ?? 'I Work as Sales Marketing in a Company.' }}</h1>
                    <p class="text-dark mt-2 leading-relaxed text-medium mb-10 text-lg lg:text-2xl">{{ $homeSection->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.' }}</p>
                    <a href="#" class="text-base font-medium bg-primaryGrey px-8 py-3 text-white rounded-md ">Get
                        In
                        Touch</a>
                </div>
                <div class="w-full self-end px-4 md:w-1/2">
                    <div class="mt-10 lg:mt-0 lg:mr-0">
                        <img src="{{ asset('storage/' . ($homeSection->image_path ?? 'images/default-home-image.png')) }}" alt="Home Image" class="w-full max-h-72 rounded">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about me section -->
    <section id="aboutMe" class="pt-32 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 md:w-full lg:w-1/3 lg:self-start">
                    <div class="mt-10 md:mt-0 md:ml-0 lg:mt-0 lg:ml-0">
                        <img src="{{ asset('storage/' . ($aboutMeSection->image_path ?? 'images/default-aboutme-image.png')) }}" alt="About Me Image" class="w-full rounded">
                    </div>
                </div>
                <div class="w-full self-center mt-10 px-4 md:w-full lg:mt-0 lg:w-2/3 lg:self-start">
                    <h4 class="text-primaryGrey font-semibold text-lg uppercase">{{ $aboutMeSection->content ?? 'About Me' }}</h4>
                    <h1 class="font-medium text-3xl lg:text-4xl mt-2">{{ $aboutMeSection->subcontent ?? 'Professional Sales Marketing' }}</h1>
                    <p class="text-base text-dark mt-4 leading-relaxed md:text-lg">{{ $aboutMeSection->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius faucibus massa sollicitudin amet augue.' }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- proyek section -->
    <section id="proyek" class="pt-32 pb-32">
        <div class="container mx-auto px-4">
            <div class="header-proyek w-full text-center mb-10">
                <h4 class="text-primaryGrey font-semibold text-lg uppercase">PROYEK UNGGULAN YANG SEDANG
                    DIPASARKAN
                </h4>
                <h1 class="text-dark font-medium text-3xl lg:text-4xl">Penawaran Terbaik untuk Kebutuhan Anda</h1>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ asset('images/image-home-p1.jpg')}}" alt="Project 1">
                    <div class="p-6">
                        <div class="font-medium text-xl lg:text-3xl mb-2">Alana Regency Gunung Sari</div>
                        <a href="detail.html"
                        class="font-medium text-base text-dark border-b-2 border-primaryGrey md:xl">Show
                        Detail <span class="inline-block"><img src="{{ asset('images/ic-arrow-pg1.png')}}" alt="Arrow"
                                class="w-5 pl-2"></span></a>
                    </div>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ asset('images/image-home-p1.jpg')}}" alt="Project 2">
                    <div class="p-6">
                        <div class="font-medium text-xl lg:text-3xl mb-2">Alana Regency Gunung Sari</div>
                        <a href="detail.html"
                            class="font-medium text-base text-dark border-b-2 border-primaryGrey md:xl">Show
                            Detail <span class="inline-block"><img src="{{ asset('images/ic-arrow-pg1.png')}}" alt="Arrow"
                                    class="w-5 pl-2"></span></a>
                    </div>
                </div>
                <div class="rounded-lg overflow-hidden shadow-lg">
                    <img class="w-full" src="{{ asset('images/image-home-p1.jpg')}}" alt="Project 3">
                    <div class="p-6">
                        <div class="font-medium text-xl lg:text-3xl mb-2">Alana Regency Gunung Sari</div>
                        <a href="detail.html"
                            class="font-medium text-base text-dark border-b-2 border-primaryGrey md:xl">Show
                            Detail <span class="inline-block"><img src="{{ asset('images/ic-arrow-pg1.png')}}" alt="Arrow"
                                    class="w-5 pl-2"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact section -->
    <section id="contact" class="pt-32 pb-32">
        <div class="container">
            <div class="header-contact w-full text-center">
                <h4 class="text-primaryGrey font-semibold text-lg uppercase">HUBUNGI SAYA</h4>
                <h1 class="text-dark font-medium text-3xl lg:text-4xl">Siap Membantu Setiap Saat</h1>
            </div>
            <div class="value-content w-full mt-10">
                <form action="{{ route('message.store') }}" method="POST">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-4">
                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-first-name">
                                First Name
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-l block w-full p-2.5"
                                id="grid-first-name" type="text" placeholder="First Name" name="firstName">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Last Name
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-l block w-full p-2.5"
                                id="grid-last-name" type="text" placeholder="Last Name" name="lastName">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-email">
                                Email
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-l block w-full p-2.5"
                                id="grid-email" type="email" placeholder="Email" name="email">
                            <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-phone">
                                Phone Number
                            </label>
                            <input
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-l block w-full p-2.5"
                                id="grid-phone" type="number" placeholder="+62" name="phoneNumber">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-3">
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-message">
                                Message
                            </label>
                            <textarea
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-l block w-full p-2.5"
                                id="grid-message" placeholder="Message" name="message"></textarea>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit"
                            class="text-base font-medium bg-primaryGrey px-8 py-3 text-white rounded-md">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <footer class="bg-lightGrey py-10">
        <div class="container mx-auto px-4">
            <div class="w-full flex flex-col md:flex-row justify-between items-center">
                <div class="flex justify-center md:justify-start items-center mb-4 md:mb-0">
                    <img src="{{ asset('images/logo.png')}}" alt="Logo" class="w-10 h-10">
                </div>
                <div class="flex flex-col md:flex-row justify-center items-center gap-4 md:gap-11 mb-4 md:mb-0">
                    <a href="#" class="text-black text-base md:text-xl font-normal leading-loose">Home</a>
                    <a href="#" class="text-black text-base md:text-xl font-normal leading-loose">Tentang Saya</a>
                    <a href="#" class="text-black text-base md:text-xl font-normal leading-loose">Proyek</a>
                    <a href="#" class="text-black text-base md:text-xl font-normal leading-loose">Hubungi Saya</a>
                </div>
                <div class="flex justify-center md:justify-end items-center gap-4">
                    <a href="#"><img src="{{ asset('images/facebook.png')}}"
                            class="p-2.5 md:w-8 md:h-8 md:p-2.5 lg:w-9 lg:h-10"></a>
                    <a href="#"><img src="{{ asset('images/Instagram.png')}}"
                            class="p-2.5 md:w-8 md:h-8 md:p-2.5 lg:w-10 lg:h-10"></a>
                    <a href="#"><img src="{{ asset('images/twitter.png')}}"
                            class="p-2.5 md:w-8 md:h-8 md:p-2.5 lg:w-10 lg:h-10"></a>
                    <a href="#"><img src="{{ asset('images/linkedln.png')}}"
                            class="p-2.5 md:w-8 md:h-8 md:p-2.5 lg:w-10 lg:h-10"></a>
                </div>
            </div>
        </div>
    </footer>
    <script>
        var homeTitle = document.getElementById('homeTitle');
        var homeSubtitle = document.getElementById('homeSubtitle');

        function colorWords(element, color1, color2) {
            var words = element.innerHTML.split(' ');

            if (words.length >= 5) {
                words[3] = '<span style="color: #96B6C5;">' + words[3] + '</span>';
                words[4] = '<span style="color: #96B6C5;">' + words[4] + '</span>';
            }

            element.innerHTML = words.join(' ');
        }


        if (homeSubtitle) {
            colorWords(homeSubtitle, 'blue', 'blue');
        }
    </script>
    
    <script src="{{ asset('js/hamburger.js')}}"></script>
@endsection