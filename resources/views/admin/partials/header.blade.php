<!-- Desktop Header -->
<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <div class="w-11/12">
        <!-- Search Input for Desktop -->
        <div class="relative">
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
    </div>
    <div x-data="{ isOpen: false }" class="relative w-1/12 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="{{ asset('images/check.png')}}">
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
            <a href="#" class="block px-4 py-2 account-link hover:text-white">Account</a>
            <a href="#" class="block px-4 py-2 account-link hover:text-white">Support</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 account-link hover:text-white">Sign Out</a>
            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
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
        <a href="index.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-tachometer-alt mr-3"></i>
            Dashboard
        </a>
        <a href="blank.html" class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
            <i class="ri-building-2-line mr-3"></i>
            Master Perumahan
        </a>
        <!-- More Nav Items -->
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-user mr-3"></i>
            My Account
        </a>
        <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sign-out-alt mr-3"></i>
            Sign Out
        </a>
    </nav>
</header>
