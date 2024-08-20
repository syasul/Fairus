@extends('base')
@section('head')
<title>Fairus | Admin Page</title>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<style>
    .font-family-karla { font-family: karla; }
    .bg-sidebar { background: #3d68ff; }
    .cta-btn { color: #3d68ff; }
    .upgrade-btn { background: #1947ee; }
    .upgrade-btn:hover { background: #0038fd; }
    .active-nav-link { background: #1947ee; }
    .nav-item:hover { background: #1947ee; }
    .account-link:hover { background: #3d68ff; }
</style>
@endsection
@section('body')
   <div class="flex">
    @include('admin.partials.sidebar')

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        @include('admin.partials.header')
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6 text-bold">Dashboard</h1>

                <!-- Home Section -->
                <section id="home" class="pt-36 bg-lightGrey pb-36 rounded-xl">
                    <div class="container">
                        <div class="flex flex-wrap">
                            <div class="w-full self-center px-4 lg:w-1/2 lg:self-center">
                                <div class="relative">
                                    <button onclick="toggleEditForm('home')" class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <div id="homeDisplay">
                                    <h4 class="text-base font-dark md:text-xl uppercase">Hi, I am Fairus Permatasari</h4>
                                    <h1 class="font-bold text-dark text-4xl lg:text-6xl">I Work as <span class="text-primaryGrey">Sales Marketing</span> in a Company.</h1>
                                    <p class="text-dark mt-2 leading-relaxed text-medium mb-10 text-lg lg:text-2xl">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</p>
                                </div>
                                <form id="homeForm" class="hidden" method="POST" action="#">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="content" rows="5" class="w-full border rounded p-2">Hi, I am Fairus Permatasari</textarea>
                                    <textarea name="subcontent" rows="5" class="w-full border rounded p-2">I Work as Sales Marketing in a Company.</textarea>
                                    <textarea name="description" rows="5" class="w-full border rounded p-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.</textarea>
                                    <button type="submit" class="bg-primaryGrey text-white px-4 py-2 rounded mt-2">Save</button>
                                </form>
                            </div>
                            <div class="w-full self-end px-4 md:w-1/2">
                                <div class="mt-10 lg:mt-0 lg:mr-0 relative">
                                    <img src="{{ asset('images/frame-foto-profile1-pg1.png') }}" alt="" srcset="" class="w-full mx-auto">
                                    <button onclick="toggleEditForm('homeImage')" class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <form id="homeImageForm" class="hidden" method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="file" name="image" class="w-full border rounded p-2">
                                    <button type="submit" class="bg-primaryGrey text-white px-4 py-2 rounded mt-2">Save Image</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- About Me Section -->
                <section id="aboutMe" class="pt-32 pb-32">
                    <div class="container">
                        <div class="flex flex-wrap">
                            <div class="w-full self-center px-4 md:w-full lg:w-1/3 lg:self-start relative">
                                <img src="{{ asset('images/frame-foto-profile2-pg1.png') }}" class="mx-auto" alt="" srcset="">
                                <button onclick="toggleEditForm('aboutMeImage')" class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded">
                                    <i class="ri-edit-2-line"></i>
                                </button>
                                <form id="aboutMeImageForm" class="hidden" method="POST" action="#" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="file" name="image" class="w-full border rounded p-2">
                                    <button type="submit" class="bg-primaryGrey text-white px-4 py-2 rounded mt-2">Save Image</button>
                                </form>
                            </div>
                            <div class="w-full self-center mt-10 px-4 md:w-full lg:mt-0 lg:w-2/3 lg:self-start">
                                <div class="relative">
                                    <button onclick="toggleEditForm('aboutMe')" class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <div id="aboutMeDisplay">
                                    <h4 class="text-primaryGrey font-semibold text-lg uppercase">TENTANG SAYA</h4>
                                    <h1 class="font-medium text-3xl lg:text-4xl">Sales Marketing Profesional, Meningkatkan Penjualan dan Brand Awareness</h1>
                                    <p class="text-base text-dark mt-2 leading-relaxed md:text-lg lg:mt-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius faucibus massa sollicitudin amet augue. Nibh metus a semper purus mauris duis. Lorem eu neque, tristique quis duis. Nibh scelerisque ac adipiscing velit non nulla in amet pellentesque.</p>
                                </div>
                                <form id="aboutMeForm" class="hidden" method="POST" action="#">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="title" rows="2" class="w-full border rounded p-2">TENTANG SAYA</textarea>
                                    <textarea name="content" rows="5" class="w-full border rounded p-2">Sales Marketing Profesional, Meningkatkan Penjualan dan Brand Awareness</textarea>
                                    <textarea name="description" rows="5" class="w-full border rounded p-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius faucibus massa sollicitudin amet augue. Nibh metus a semper purus mauris duis. Lorem eu neque, tristique quis duis. Nibh scelerisque ac adipiscing velit non nulla in amet pellentesque.</textarea>
                                    <button type="submit" class="bg-primaryGrey text-white px-4 py-2 rounded mt-2">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
    <script>
        function toggleEditForm(section) {
            const displayDiv = document.getElementById(section + 'Display');
            const form = document.getElementById(section + 'Form');
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                displayDiv.classList.add('hidden');
            } else {
                form.classList.add('hidden');
                displayDiv.classList.remove('hidden');
            }
        }
        </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
   </div>
   
@endsection