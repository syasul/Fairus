<!-- Desktop Header -->
<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-full">
        <!-- Search Input for Desktop -->
        <div class="relative">
            <form action="{{ url()->current() }}" method="GET">
                <input 
                    type="text" 
                    name="search" 
                    class="border border-gray-300 rounded-lg py-2 px-4 w-full" 
                    placeholder="Search..." 
                    value="{{ request('search') }}">
                <button class="absolute right-0 top-0 mt-2 mr-4">
                    <i class="ri-search-line"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="relative  flex justify-end items-center">
        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-red-500 hover:text-red-500 ml-5 scale-150"> <!-- Adjusted spacing with ml-2 -->
            <i class="ri-logout-box-r-line"></i>
        </a>
    </div>
</header>


<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Mobile Search Input -->
    <div class="relative mt-4">
        <form action="{{ url()->current() }}" method="GET">
            <!-- URL saat ini akan otomatis mengikuti page aktif -->
            <input 
                type="text" 
                name="search" 
                class="border border-gray-300 rounded-lg py-2 px-4 w-full" 
                placeholder="Search..." 
                value="{{ request('search') }}"> <!-- Agar input search mempertahankan nilai sebelumnya -->
            <button class="absolute right-0 top-0 mt-2 mr-4">
                <i class="ri-search-line"></i>
            </button>
        </form>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="{{ route('dashboard.index') }}" class="flex items-center {{ Request::routeIs('dashboard.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-dashboard-3-line mr-3"></i>
            Dashboard
        </a>
        <a href="{{ route('master-perumahan.index') }}" class="flex items-center {{ Request::routeIs('master-perumahan.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-building-2-line mr-3"></i>
            Master Perumahan
        </a>
        <a href="{{ route('master-rumah.index') }}" class="flex items-center {{ Request::routeIs('master-rumah.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-home-line mr-3"></i>
            Master Rumah
        </a>
        <a href="{{ route('master-fasilitas.index') }}" class="flex items-center {{ Request::routeIs('master-fasilitas.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-image-add-line mr-3"></i>
            Master Fasilitas
        </a>
        <a href="{{ route('master-user.index') }}" class="flex items-center {{ Request::routeIs('master-user.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-user-line mr-3"></i>
            Master User
        </a>
        <a href="{{ route('master-penghargaan.index') }}" class="flex items-center {{ Request::routeIs('master-penghargaan.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-award-line mr-3"></i>
            Master Penghargaan
        </a>
        <a href="{{ route('master-foto-pembelian.index') }}" class="flex items-center {{ Request::routeIs('master-foto-pembayaran.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-service-line mr-3"></i>
            Master Pembelian
        </a>
        <a href="{{ route('message.index') }}" class="flex items-center {{ Request::routeIs('message.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-chat-4-line mr-3"></i>
            Pesan
        </a>
        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-white py-4 pl-6 nav-item"> <!-- Adjusted spacing with ml-2 -->
            <i class="ri-logout-box-r-line mr-3"></i>
            Log Out
        </a>
    </nav>
</header>
