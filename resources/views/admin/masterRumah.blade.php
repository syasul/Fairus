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
                    <h1 class="text-3xl text-black pb-6 text-bold">Master Rumah</h1>

                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @elseif(session('alert'))
                        <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                            {{ session('alert') }}
                        </div>
                    @endif

                    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


                    <div class="w-full mt-6">
                        <div class="flex justify-between mb-5">
                            <p class="text-xl pb-3 flex items-center">
                                <i class="ri-list-check mr-2"></i> List Rumah
                            </p>
                            <button data-modal-toggle="add-rumah-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 items-center py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                <i class="ri-add-line mr-3 text-lg"></i> Add Rumah
                            </button>
                        </div>

                        <div class="bg-white overflow-auto">
                            <table class="min-w-full bg-white">
                                <thead class="bg-gray-800 text-white">
                                    <tr>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Image Rumah</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Tipe Rumah</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Perumahan</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Deskripsi</th>
                                        <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach ($rumahs as $rumah)
                                    <tr>
                                        <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                        <td class="text-center py-3 px-4 flex justify-center">
                                            <img src="{{ asset('storage/Home/' . $rumah->gambar_rumah) }}" alt="Rumah Image" class="w-20 h-20 object-cover text-center rounded-lg">
                                        </td>
                                        <td class="text-center py-3 px-4">{{ $rumah->tipe }}</td>
                                        <td class="text-center py-3 px-4">{{ $rumah->perumahan->nama_perumahan }}</td>
                                        <td class="text-center py-3 px-4">{{ $rumah->deskripsi }}</td>
                                        <td class="text-center py-3 px-4">
                                            <div class="flex items-center justify-center gap-3">
                                                <button data-modal-toggle="edit-rumah-modal-{{ $rumah->id_rumah }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                                    <i class="ri-edit-line"></i>
                                                </button>
                                                <button data-modal-toggle="delete-rumah-modal-{{ $rumah->id_rumah }}" class="bg-red-500 text-white px-2 py-1 rounded-lg">
                                                    <i class="ri-delete-bin-6-line"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </main>
        
                <!-- Add Rumah Modal -->
                <div id="add-rumah-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex justify-between items-center p-4 border-b">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Add Rumah
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-rumah-modal">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-rumah.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="gambar_rumah" class="text-sm font-medium text-gray-900 block mb-2">Image Rumah</label>
                                    <input type="file" name="gambar_rumah" id="gambar_rumah" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Image URL" required>
                                </div>
                                <div>
                                    <label for="tipe" class="text-sm font-medium text-gray-900 block mb-2">Tipe Rumah</label>
                                    <input type="text" name="tipe" id="tipe" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tipe Rumah" required>
                                </div>                            
                                <div>
                                    <label for="perumahan" class="text-sm font-medium text-gray-900 block mb-2">Perumahan</label>
                                    <select name="id_perumahan" id="perumahan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <option value="">Select Perumahan</option>
                                        @foreach($perumahans as $perumahan)
                                            <option value="{{ $perumahan->id_perumahan }}">{{ $perumahan->nama_perumahan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div>
                                    <label for="deskripsi" class="text-sm font-medium text-gray-900 block mb-2">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Deskripsi Rumah" required></textarea>
                                </div>
                            
                                <div class="flex justify-center">
                                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Rumah</button>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>

                <!-- Edit Rumah Modal -->
                @foreach ($rumahs as $rumah)
                <div id="edit-rumah-modal-{{ $rumah->id_rumah }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex justify-between items-center p-4 border-b">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Edit Rumah
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="edit-rumah-modal-{{ $rumah->id_rumah }}">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-rumah.update', $rumah->id_rumah) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                            
                                <div>
                                    <label for="gambar_rumah" class="text-sm font-medium text-gray-900 block mb-2">Image Rumah</label>
                                    <img src="{{ asset('storage/Home/' . $rumah->gambar_rumah) }}" alt="Rumah Image" class="w-20 h-20 object-cover rounded-lg mb-3">
                                    <input type="file" name="gambar_rumah" id="gambar_rumah" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <p class="text-sm text-gray-500 mt-1">Leave empty if you don't want to change the image</p>
                                </div>
                            
                                <div>
                                    <label for="perumahan" class="text-sm font-medium text-gray-900 block mb-2">Perumahan</label>
                                    <select name="id_perumahan" id="perumahan" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        @foreach($perumahans as $perumahan)
                                            <option value="{{ $perumahan->id_perumahan }}" {{ $perumahan->id_perumahan == $rumah->id_perumahan ? 'selected' : '' }}>{{ $perumahan->nama_perumahan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            
                                <div>
                                    <label for="tipe" class="text-sm font-medium text-gray-900 block mb-2">Tipe Rumah</label>
                                    <input type="text" name="tipe" id="tipe" value="{{ $rumah->tipe }}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                </div>                            
                            
                                <div>
                                    <label for="deskripsi" class="text-sm font-medium text-gray-900 block mb-2">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>{{ $rumah->deskripsi }}</textarea>
                                </div>
                            
                                <div class="flex justify-center">
                                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Rumah</button>
                                </div>
                            </form>                        
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Delete Rumah Modal -->
                @foreach ($rumahs as $rumah)
                <div id="delete-rumah-modal-{{ $rumah->id_rumah }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                        <div class="bg-white rounded-lg shadow relative">
                            <div class="flex justify-between items-center p-4 border-b">
                                <h3 class="text-lg font-semibold text-gray-900">
                                    Delete Rumah
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="delete-rumah-modal-{{ $rumah->id_rumah }}">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <p>Are you sure you want to delete this Rumah?</p>
                            </div>
                            <div class="flex justify-center p-6 space-x-2 border-t">
                                <form action="{{ route('master-rumah.destroy', $rumah->id_rumah) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg px-5 py-2.5 text-center">Delete</button>
                                </form>
                                <button data-modal-toggle="delete-rumah-modal-{{ $rumah->id_rumah }}" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg px-5 py-2.5">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
            
        </div>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    </div>
    
    @endsection