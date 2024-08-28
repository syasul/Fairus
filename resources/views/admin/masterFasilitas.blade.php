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
                <h1 class="text-3xl text-black pb-6 text-bold">Master Fasilitas</h1>

                <div class="w-full mt-6">
                    <div class="flex justify-between mb-5">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="ri-list-check mr-2"></i> List Fasilitas
                        </p>
                        <button data-modal-toggle="add-fasilitas-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 items-center py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="ri-add-line mr-3 text-lg"></i> Add Fasilitas
                        </button>
                    </div>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Image Fasilitas</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Nama Fasilitas</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($fasilitas as $fasilita)
                                <tr>
                                    <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center py-3 px-4 flex justify-center">
                                        <img src="{{ asset('storage/Facility/' . $fasilita->gambar_fasilitas) }}" alt="Fasilitas Image" class="w-20 h-20 object-cover text-center rounded-lg">
                                    </td>
                                    <td class="text-center py-3 px-4">{{ $fasilita->nama_fasilitas }}</td>
                                    <td class="text-center py-3 px-4">
                                        <div class="flex items-center justify-center gap-3">
                                            <button data-modal-toggle="edit-fasilitas-modal-{{ $fasilita->id_fasilitas }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button data-modal-toggle="delete-fasilitas-modal-{{ $fasilita->id_fasilitas }}" class="bg-red-500 text-white px-2 py-1 rounded-lg">
                                                <i class="ri-delete-bin-6-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $fasilitas->links() }}
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Add Fasilitas Modal -->
        <div id="add-fasilitas-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative ">
                    <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">
                            Add Fasilitas
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-fasilitas-modal">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="gambar_fasilitas" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Image Fasilitas</label>
                            <input type="file" name="gambar_fasilitas" id="gambar_fasilitas" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white" placeholder="Image URL" required>
                        </div>
                        <div>
                            <label for="nama_fasilitas" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Nama Fasilitas</label>
                            <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white" placeholder="Nama Fasilitas" required>
                        </div>
                       
                        <div class="flex justify-center">
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Fasilitas</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <!-- Edit Fasilitas Modal -->
        @foreach ($fasilitas as $fasilita)
        <div id="edit-fasilitas-modal-{{ $fasilita->id_fasilitas }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                    <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Fasilitas
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edit-fasilitas-modal-{{ $fasilita->id_fasilitas }}">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                            <label for="gambar_fasilitas" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Image Fasilitas</label>
                            <input type="file" name="gambar_fasilitas" id="gambar_fasilitas" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white" placeholder="Image URL" required>
                        </div>
                        <div>
                            <label for="nama_fasilitas" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Nama Fasilitas</label>
                            <input type="text" name="nama_fasilitas" id="nama_fasilitas" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white" placeholder="Nama Fasilitas" required>
                        </div>
                       
                        <div class="flex justify-center">
                            <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Fasilitas</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        @endforeach

        <!-- Delete Fasilitas Modal -->
        @foreach ($fasilitas as $fasilita)
        <div id="delete-fasilitas-modal-{{ $fasilita->id_fasilitas }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
            <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                    <div class="flex justify-between items-center p-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Delete Fasilitas
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="delete-fasilitas-modal-{{ $fasilita->id_fasilitas }}">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-fasilitas.destroy', $fasilita->id_fasilitas) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <p class="text-sm text-gray-500 dark:text-gray-300">Are you sure you want to delete this fasilitas?</p>
                        <div class="flex justify-center">
                            <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

   
@endsection