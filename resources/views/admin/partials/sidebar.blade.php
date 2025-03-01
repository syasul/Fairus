<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="mt-6 p-6 flex flex-col justify-center h-20">
        <a href="{{ route('dashboard.index') }}" class="text-white text-3xl font-semibold uppercase hover:text-gray-300 text-center">Fairus</a>
        
    </div>
    <nav class="text-white text-sm font-medium mt-10">
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
        <a href="{{ route('master-video.index') }}" class="flex items-center {{ Request::routeIs('master-video.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-video-add-line mr-3"></i>
            Master Video
        </a>
        <a href="{{ route('master-user.index') }}" class="flex items-center {{ Request::routeIs('master-user.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-user-line mr-3"></i>
            Master User
        </a>
        <a href="{{ route('master-penghargaan.index') }}" class="flex items-center {{ Request::routeIs('master-penghargaan.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-award-line mr-3"></i>
            Master Penghargaan
        </a>
        <a href="{{ route('master-foto-pembelian.index') }}" class="flex items-center {{ Request::routeIs('master-foto-pembelian.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-service-line mr-3"></i>
            Master Pembelian
        </a>
        <a href="{{ route('message.index') }}" class="flex items-center {{ Request::routeIs('message.index') ? 'active-nav-link' : 'opacity-75 hover:opacity-100' }} text-white py-4 pl-6 nav-item">
            <i class="ri-chat-4-line mr-3"></i>
            Pesan
        </a>
    </nav>
</aside>
