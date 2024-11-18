@extends('base')
@section('head')
<title>Fairus | Admin Page</title>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<style>
    .font-family-karla {
        font-family: karla;
    }

    .bg-sidebar {
        background: #3d68ff;
    }

    .cta-btn {
        color: #3d68ff;
    }

    .upgrade-btn {
        background: #1947ee;
    }

    .upgrade-btn:hover {
        background: #0038fd;
    }

    .active-nav-link {
        background: #1947ee;
    }

    .nav-item:hover {
        background: #1947ee;
    }

    .account-link:hover {
        background: #3d68ff;
    }

    input:focus {
        outline: none;
    }
</style>
@endsection
@section('body')
<div class="flex">
    @include('admin.partials.sidebar')

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        @include('admin.partials.header')

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6 text-bold">Master Video</h1>

                @if(session('success'))
                <div id="flasher-message" class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
                @elseif(session('alert'))
                <div id="flasher-message" class="bg-yellow-500 text-white p-4 rounded mb-4">
                    {{ session('alert') }}
                </div>
                @endif
                <div class="w-full mt-6">
                    <div class="flex justify-between mb-5">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="ri-list-check mr-2"></i> List Video
                        </p>
                        <button data-modal-toggle="add-video-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 items-center py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <i class="ri-add-line mr-3 text-lg"></i> Add Video
                        </button>
                    </div>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Nama Perumahan</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Video</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @if ($videos->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center py-3 px-4">
                                        Tidak ada Video Rumah yang tersedia.
                                    </td>
                                </tr>
                                @else
                                @foreach ($videos as $video)
                                <tr>
                                    <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center py-3 px-4">{{ $video->perumahan->nama_perumahan }}</td>
                                    <td class="text-center py-3 px-4"><iframe src="{{ asset('storage/Video/' . $video->video) }}" autoplay="0" class="w-1/6 aspect-[9/16] mx-auto"></iframe></td>
                                    <td class="text-center py-3 px-4">
                                        <div class="flex items-center justify-center gap-3">
                                            <button data-modal-toggle="edit-video-modal-{{ $video->id_video }}"
                                                class="bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button data-modal-toggle="delete-video-modal-{{ $video->id_video }}"
                                                class="bg-red-500 text-white px-2 py-1 rounded-lg">
                                                <i class="ri-delete-bin-6-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-6">
                        {{ $videos->appends(request()->input())->links() }}
                    </div>
                </div>
            </main>

            <!-- Add Video Modal -->
            <div id="add-video-modal" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-between items-center p-4 border-b">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Add Video
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="add-video-modal">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                            action="{{ route('master-video.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="perumahan"
                                    class="text-sm font-medium text-gray-900 block mb-2">Perumahan</label>
                                <select name="id_perumahan" id="perumahan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                                    required>
                                    <option value="">Select Perumahan</option>
                                    @foreach($perumahans as $perumahan)
                                    <option value="{{ $perumahan->id_perumahan }}">{{ $perumahan->nama_perumahan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="Perumahan" class="text-sm font-medium text-gray-900 block mb-2">Video
                                    Perumahan</label>
                                <input type="file" name="video" id="video_perumahan"
                                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5"
                                    placeholder="Video URL" required>
                            </div>

                            <div class="flex justify-center">
                                <button type="submit"
                                    class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add
                                    Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Video Modal -->
            @foreach ($videos as $video)
            <div id="edit-video-modal-{{ $video->id_video }}" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative">
                        <div class="flex justify-between items-center p-4 border-b">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Edit Video
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="edit-video-modal-{{ $video->id_video }}">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8"
                            action="{{ route('master-video.update', $video->id_video) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="perumahan"
                                    class="text-sm font-medium text-gray-900 block mb-2">Perumahan</label>
                                <select name="id_perumahan" id="perumahan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                                    required>
                                    @foreach($perumahans as $perumahan)
                                    <option value="{{ $perumahan->id_perumahan }}" {{ $perumahan->id_perumahan ==
                                        $video->id_perumahan ? 'selected' : '' }}>{{ $perumahan->nama_perumahan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="video_perumahan" class="text-sm font-medium text-gray-900 block mb-2">Video
                                    Perumahan</label>
                                <iframe src="{{ asset('storage/Video/' . $video->video) }}" alt="Perumahan_Video"
                                    class="w-1/6 object-cover rounded-lg mb-3 aspect-[9/16] mx-auto"></iframe>
                                <input type="file" name="video" id="video_perumahan"
                                    class="bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">

                            </div>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="w-full text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update
                                    Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Delete Video Modal -->
            @foreach ($videos as $video)
            <div id="delete-video-modal-{{ $video->id_video }}" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <div class="bg-white rounded-lg shadow relative ">
                        <div class="flex justify-between items-center p-4 border-b">
                            <h3 class="text-lg font-semibold text-gray-900">
                                Delete Video
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="delete-video-modal-{{ $video->id_video }}">
                                <i class="ri-close-line"></i>
                            </button>
                        </div>
                        <form action="{{ route('master-video.destroy', $video->id_video) }}" method="POST"
                            class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8">
                            @csrf
                            @method('DELETE')
                            <p class="text-sm text-gray-500 ">Are you sure you want to delete this Video?</p>
                            <div class="flex justify-center">
                                <button type="submit"
                                    class="w-full text-white bg-red-600 hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</div>

    <script src="{{ asset('js/flasher.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
@endsection