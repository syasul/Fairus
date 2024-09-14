@extends('base')

@section('head')
<title>Fairus | Admin Page</title>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

<style>
    .bg-sidebar { background: #3d68ff; }
    .cta-btn { color: #3d68ff; }
    .upgrade-btn { background: #1947ee; }
    .upgrade-btn:hover { background: #0038fd; }
    .active-nav-link { background: #1947ee; }
    .nav-item:hover { background: #1947ee; }
    .account-link:hover { background: #3d68ff; }
    button[data-modal-toggle] i.ri-close-line {
    font-size: 1.5rem; /* Increase font size */
    padding: 0.5rem; /* Increase padding */}
</style>
@endsection

@section('body')
<div class="flex">
    @include('admin.partials.sidebar')

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        @include('admin.partials.header')

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6 text-bold">Master Penghargaan</h1>
                @if(session('success'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @elseif(session('alert'))
                    <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                        {{ session('alert') }}
                    </div>
                @endif
                <div class="w-full mt-6">
                    <div class="flex justify-between mb-5">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="ri-list-check mr-2"></i> List Penghargaan
                        </p>
                        <button data-modal-toggle="add-penghargaan-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 items-center py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="ri-add-line mr-3 text-lg"></i> Add Penghargaan
                        </button>
                    </div>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Image Achivement</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Name Achivement</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($penghargaans as $penghargaan)
                                <tr>
                                    <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center py-3 px-4 flex justify-center">
                                        <img src="{{ asset('storage/Achivement/' . $penghargaan->imageAchivement) }}" alt="Achievement Image" class="w-20 h-20 object-cover text-center rounded-lg">
                                    </td>
                                    
                                    <td class="text-center py-3 px-4">{{ $penghargaan->nameAchivement }}</td>
                                    <td class="text-center py-3 px-4">
                                        <div class="flex items-center justify-center gap-3">
                                            <button data-modal-toggle="edit-penghargaan-modal-{{ $penghargaan->id }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button data-modal-toggle="delete-penghargaan-modal-{{ $penghargaan->id }}" class="bg-red-500 text-white px-2 py-1 rounded-lg">
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
                        {{ $penghargaans->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add Penghargaan Modal -->
    <div id="add-penghargaan-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Add Penghargaan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="add-penghargaan-modal">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-penghargaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="imageAchivement" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Image Achivement</label>
                        <input type="file" name="imageAchivement" id="imageAchivement" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white" placeholder="Image URL" required>
                    </div>
                    <div>
                        <label for="nameAchivement" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Name Achivement</label>
                        <input type="text" name="nameAchivement" id="nameAchivement" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Name Achivement" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Add Penghargaan
                    </button>
                </form>
            </div>
        </div>
    </div>

    @foreach ($penghargaans as $penghargaan)
    <!-- Edit Penghargaan Modal -->
    <div id="edit-penghargaan-modal-{{ $penghargaan->id }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Update Penghargaan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="edit-penghargaan-modal-{{ $penghargaan->id }}">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-penghargaan.update', $penghargaan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <img src="{{ asset('storage/Achivement/' . $penghargaan->imageAchivement) }}" alt="Image Achievement" class="w-full h-auto mb-4 rounded-lg">
                        <label for="imageAchivement" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Image Achivement</label>
                        <input type="file" name="imageAchivement" id="imageAchivement" class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:placeholder-gray-400 dark:text-white">
                    </div>                
                    <div>
                        <label for="nameAchivement" class="text-sm font-medium text-gray-900 block mb-2 dark:text-gray-300">Name Achivement</label>
                        <input type="text" value="{{ old('nameAchivement', $penghargaan->nameAchivement) }}" name="nameAchivement" id="imageAchivement" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Penghargaan
                    </button>
                </form>                           
            </div>
        </div>
    </div>

    <!-- Delete Penghargaan Modal -->
    <div id="delete-penghargaan-modal-{{ $penghargaan->id }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Delete Penghargaan
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="delete-penghargaan-modal-{{ $penghargaan->id }}">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-penghargaan.destroy', $penghargaan->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <p class="text-sm text-gray-900 dark:text-white">Are you sure you want to delete this penghargaan?</p>
                    <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Delete Penghargaan
                    </button>
                </form>
                
                
            </div>
        </div>
    </div>
    @endforeach
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
@endsection
