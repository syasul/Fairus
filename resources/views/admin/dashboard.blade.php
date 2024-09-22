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
    input:focus {outline: none;}

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

                <!-- Display messages -->
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @elseif(session('alert'))
                    <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                        {{ session('alert') }}
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 py-4">
                    <!-- Card 1 -->
                    <div class="bg-white shadow-md rounded-lg px-6 py-4 flex items-center">
                        <div class="bg-blue-500 p-4 w-12 h-12 rounded-full text-white flex justify-center items-center mr-4"> <!-- Increased padding to p-4 -->
                            <i class="ri-building-2-line scale-175"></i>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold">Total Perumahan</h5>
                            <p class="text-gray-500">Jumlah: {{ $perumahanCount }}</p>
                        </div>
                    </div>

                    <div class="bg-white shadow-md rounded-lg px-6 py-4 flex items-center">
                        <div class="bg-blue-500 p-4 w-12 h-12 rounded-full text-white flex justify-center items-center mr-4"> <!-- Increased padding to p-4 -->
                            <i class="ri-home-line scale-175"></i>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold">Total Rumah</h5>
                            <p class="text-gray-500">Jumlah: {{ $rumahCount }}</p>
                        </div>
                    </div>
                    
                    <!-- Card 2 -->
                    <div class="bg-white shadow-md rounded-lg px-6 py-4 flex items-center">
                        <div class="bg-blue-500 p-4 w-12 h-12 rounded-full text-white flex justify-center items-center mr-4"> <!-- Increased padding to p-4 -->
                            <i class="ri-image-add-line scale-175"></i>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold">Total Fasilitas</h5>
                            <p class="text-gray-500">Jumlah: {{ $fasilitasCount }}</p>
                        </div>
                    </div>
                    
                    <!-- Card 3 -->
                    <div class="bg-white shadow-md rounded-lg px-6 py-4 flex items-center">
                        <div class="bg-blue-500 p-4 w-12 h-12 rounded-full text-white flex justify-center items-center mr-4"> <!-- Increased padding to p-4 -->
                            <i class="ri-award-line scale-175"></i>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold">Total Penghargaan</h5>
                            <p class="text-gray-500">Jumlah: {{ $penghargaanCount }}</p>
                        </div>
                    </div>
                    
                    <!-- Card 4 -->
                    <div class="bg-white shadow-md rounded-lg px-6 py-4 flex items-center">
                        <div class="bg-blue-500 p-4 w-12 h-12 rounded-full text-white flex justify-center items-center mr-4"> <!-- Increased padding to p-4 -->
                            <i class="ri-chat-4-line scale-175"></i>
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold">Total Pesan</h5>
                            <p class="text-gray-500">Jumlah: {{ $pesanCount }}</p>
                        </div>
                    </div>

                   
                </div>
                
                  

                <!-- Home Section -->
                <section id="home" class="pt-36 bg-lightGrey pb-36 rounded-xl">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap">
                            <!-- Text Content -->
                            <div class="w-full lg:w-1/2 px-4">
                                <div class="relative">
                                    <button onclick="toggleEditForm('home')" class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <div id="homeDisplay">
                                    <h4 class="text-base font-medium md:text-xl uppercase">{{ $homeSection->content ?? 'Hi, I am Fairus Permatasari' }}</h4>
                                    <h1 class="font-bold text-dark text-4xl lg:text-6xl mt-2" id="homeSubtitle">{{ $homeSection->subcontent ?? 'I Work as Sales Marketing in a Company.' }}</h1>
                                    <p class="text-dark mt-4 leading-relaxed text-lg lg:text-2xl">{{ $homeSection->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.' }}</p>
                                </div>
                                <form id="homeForm" class="hidden mt-4" method="POST" action="{{ route('update.section', ['section' => 'home']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Content:</label>
                                        <textarea name="content" rows="2" class="w-full border rounded p-2">{{ $homeSection->content ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Subcontent:</label>
                                        <textarea name="subcontent" rows="2" class="w-full border rounded p-2">{{ $homeSection->subcontent ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Description:</label>
                                        <textarea name="description" rows="4" class="w-full border rounded p-2">{{ $homeSection->description ?? '' }}</textarea>
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                                    <button type="button" onclick="toggleEditForm('home')" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
                                </form>
                            </div>
                            <!-- Image Content -->
                            <div class="w-full lg:w-1/2 px-4 mt-10 lg:mt-0">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . ($homeSection->image_path ?? 'images/frame-foto-profile1-pg1.png')) }}" alt="Home Image" class="w-full max-h-72 rounded">
                                    <button onclick="toggleEditForm('homeImage')" class="absolute top-2 right-2 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <form id="homeImageForm" class="hidden mt-4" method="POST" action="{{ route('update.section', ['section' => 'home']) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Upload Image:</label>
                                        <input type="file" name="image" class="w-full border rounded p-2">
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Image</button>
                                    <button type="button" onclick="toggleEditForm('homeImage')" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- About Me Section -->
                <section id="aboutMe" class="pt-36 pb-36">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap">
                            <!-- Image Content -->
                            <div class="w-full lg:w-1/3 px-4">
                                <div class="relative">
                                    <img src="{{ asset('storage/' . ($aboutMeSection->image_path ?? 'images/frame-foto-profile2-pg1.png')) }}" alt="About Me Image" class="w-full rounded">
                                    <button onclick="toggleEditForm('aboutMeImage')" class="absolute top-2 right-2 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <form id="aboutMeImageForm" class="hidden mt-4" method="POST" action="{{ route('update.section', ['section' => 'aboutMe']) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Upload Image:</label>
                                        <input type="file" name="image" class="w-full border rounded p-2">
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Image</button>
                                    <button type="button" onclick="toggleEditForm('aboutMeImage')" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
                                </form>
                            </div>
                            <!-- Text Content -->
                            <div class="w-full lg:w-2/3 px-4 mt-10 lg:mt-0">
                                <div class="relative">
                                    <button onclick="toggleEditForm('aboutMe')" class="absolute top-0 right-0 bg-blue-500 text-white px-2 py-1 rounded">
                                        <i class="ri-edit-2-line"></i>
                                    </button>
                                </div>
                                <div id="aboutMeDisplay">
                                    <h4 class="text-primaryGrey font-semibold text-lg uppercase">{{ $aboutMeSection->content ?? 'About Me' }}</h4>
                                    <h1 class="font-medium text-3xl lg:text-4xl mt-2">{{ $aboutMeSection->subcontent ?? 'Professional Sales Marketing' }}</h1>
                                    <p class="text-base text-dark mt-4 leading-relaxed md:text-lg">{{ $aboutMeSection->description ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce varius faucibus massa sollicitudin amet augue.' }}</p>
                                </div>
                                <form id="aboutMeForm" class="hidden mt-4" method="POST" action="{{ route('update.section', ['section' => 'aboutMe']) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Content:</label>
                                        <textarea name="content" rows="2" class="w-full border rounded p-2">{{ $aboutMeSection->content ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Subcontent:</label>
                                        <textarea name="subcontent" rows="2" class="w-full border rounded p-2">{{ $aboutMeSection->subcontent ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700">Description:</label>
                                        <textarea name="description" rows="4" class="w-full border rounded p-2">{{ $aboutMeSection->description ?? '' }}</textarea>
                                    </div>
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                                    <button type="button" onclick="toggleEditForm('aboutMe')" class="bg-gray-500 text-white px-4 py-2 rounded ml-2">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

            </main>
        </div>
    </div>

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

        // Function to update content dynamically (if needed)
        function updateContent(section, content) {
            const displayDiv = document.getElementById(section + 'Display');
            displayDiv.innerHTML = content;
        }
    </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</div>
@endsection
