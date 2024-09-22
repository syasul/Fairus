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
    input:focus {outline: none;}
    textarea:focus {outline: none;}
</style>
@endsection
@section('body')
<div class="flex">
    @include('admin.partials.sidebar')

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        @include('admin.partials.header')

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6 text-bold">Master Perumahan</h1>



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
                            <i class="ri-list-check mr-2"></i> List Perumahan
                        </p>
                        <button data-modal-toggle="add-perumahan-modal"
                            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 items-center py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            <i class="ri-add-line mr-3 text-lg"></i> Add Perumahan
                        </button>
                    </div>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Foto Perumahan
                                    </th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Nama Perumahan
                                    </th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Deskripsi
                                        Perumahan</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @if ($perumahans->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center py-3 px-4">
                                        Tidak ada Perumahan yang tersedia.
                                    </td>
                                </tr>
                                @else
                                    @foreach ($perumahans as $perumahan)
                                        <tr>
                                            <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                            <td class="text-center py-3 px-4 flex justify-center">
                                                <img src="{{ asset('storage/Perumahan/' . $perumahan->gambar_perumahan) }}"
                                                    alt="Perumahan Image" class="w-20 h-20 object-cover rounded-lg">

                                            </td>

                                            <td class="text-center py-3 px-4">{{ $perumahan->nama_perumahan }}</td>
                                            <td class="text-center py-3 px-4">{{ $perumahan->deskripsi_singkat }}</td>
                                            <td class="text-center py-3 px-4">
                                                <div class="flex items-center justify-center gap-3">
                                                    <button
                                                        data-modal-toggle="edit-perumahan-modal-{{ $perumahan->id_perumahan }}"
                                                        class="bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                                        <i class="ri-edit-line"></i>
                                                    </button>
                                                    <button
                                                        data-modal-toggle="delete-perumahan-modal-{{ $perumahan->id_perumahan }}"
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
                        {{ $perumahans->appends(request()->input())->links() }}
                    </div>
                </div>
                <!-- Content goes here! 😁 -->
            </main>
        </div>
    </div>

    <!-- Modal Add Perumahan -->
    <div id="add-perumahan-modal" aria-hidden="true"
    class="fixed inset-0 flex items-center justify-center z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
    <div class="relative w-full max-w-2xl bg-white rounded-lg shadow-lg">
        <div class="relative bg-white rounded-t-lg border-b border-gray-200">
            <div class="flex items-center justify-between p-4">
                <h3 class="text-lg font-semibold text-gray-900">
                        Tambah Perumahan
                    </h3>
                    <button type="button"
                        class="text-gray-500 hover:text-gray-700 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-toggle="add-perumahan-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="p-6 max-h-[70vh] overflow-y-auto">
                    <form action="{{ route('master-perumahan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_perumahan" class="block text-gray-700">Nama Perumahan</label>
                            <input type="text" name="nama_perumahan"
                                class="mt-1 px-3 py-2 block w-full border border-gray-300 rounded-lg shadow-sm "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="deskripsi_singkat" class="block text-gray-700">Deskripsi Singkat</label>
                            <textarea name="deskripsi_singkat"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                required rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="gambar_perumahan" class="block text-gray-700">Gambar Perumahan</label>
                            <input type="file" name="gambar_perumahan"
                                class="mt-1 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="gambar_jumbotron" class="block text-gray-700">Gambar Jumbotron</label>
                            <input type="file" name="gambar_jumbotron"
                                class="mt-1 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="about_perumahan_sub_title" class="block text-gray-700">About Perumahan
                                Subtitle</label>
                            <input type="text" name="about_perumahan_sub_title"
                                class="mt-1 px-3 py-2 block w-full border border-gray-300 rounded-lg shadow-sm "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="about_perumahan_content" class="block text-gray-700">About Perumahan
                                Content</label>
                            <textarea name="about_perumahan_content"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                required rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="about_perumahan_image" class="block text-gray-700">About Perumahan Image</label>
                            <input type="file" name="about_perumahan_image"
                                class="mt-1 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="alasan_perumahan_content" class="block text-gray-700">Alasan Perumahan
                                Content</label>
                            <textarea name="alasan_perumahan_content"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                required rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="about_perumahan_image1" class="block text-gray-700">About Perumahan Image
                                1</label>
                            <input type="file" name="about_perumahan_image1"
                                class="mt-1 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="about_perumahan_image2" class="block text-gray-700">About Perumahan Image
                                2</label>
                            <input type="file" name="about_perumahan_image2"
                                class="mt-1 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="fasilitas_perumahan_title" class="block text-gray-700">Fasilitas Perumahan
                                Title</label>
                            <input type="text" name="fasilitas_perumahan_title"
                                class="mt-1 px-3 py-2 block w-full border border-gray-300 rounded-lg shadow-sm "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="maps_perumahan_sub_title" class="block text-gray-700">Maps Perumahan
                                Subtitle</label>
                            <input type="text" name="maps_perumahan_sub_title"
                                class="mt-1 px-3 py-2 block w-full border border-gray-300 rounded-lg shadow-sm "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="maps_perumahan_content" class="block text-gray-700">Maps Perumahan
                                Content</label>
                            <textarea name="maps_perumahan_content"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                required rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="maps_perumahan_image" class="block text-gray-700">Maps Perumahan Image</label>
                            <input type="file" name="maps_perumahan_image"
                                class="mt-1 bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block w-full p-2.5">
                        </div>
                        <div class="mb-4">
                            <label for="pembayaran_perumahan_title" class="block text-gray-700">Pembayaran Perumahan
                                Title</label>
                            <input type="text" name="pembayaran_perumahan_title"
                                class="mt-1 px-3 py-2 block w-full border border-gray-300 rounded-lg shadow-sm "
                                required>
                        </div>
                        <div class="mb-4">
                            <label for="pembayaran_perumahan_content" class="block text-gray-700">Pembayaran Perumahan
                                Content</label>
                            <textarea name="pembayaran_perumahan_content"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg"
                                required rows="4"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="penghargaan_title" class="block text-gray-700">Penghargaan Title</label>
                            <input type="text" name="penghargaan_title"
                                class="mt-1 px-3 py-2 block w-full border border-gray-300 rounded-lg shadow-sm "
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Fasilitas</label>
                            @foreach($fasilitas as $f)
                            <div class="flex items-center mb-2">
                                <input type="checkbox" name="fasilitas[]" value="{{ $f->id_fasilitas }}"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                                <label class="ml-2 text-gray-700">{{ $f->nama_fasilitas }}</label>
                            </div>
                            @endforeach
                        </div>
                        <button type="submit"
                            class="px-4 py-2 w-full bg-blue-500 text-white rounded-lg hover:bg-blue-600">Tambah Perumahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal Edit Perumahan -->
    @foreach ($perumahans as $perumahan)
    <div id="edit-perumahan-modal-{{ $perumahan->id_perumahan }}" tabindex="-1" aria-hidden="true"
        class="fixed inset-0 flex items-center justify-center z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
        <div class="relative w-full max-w-2xl bg-white rounded-lg shadow-lg">
            <div class="relative bg-white rounded-t-lg border-b border-gray-200">
                <div class="flex items-center justify-between p-4">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Perumahan
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5"
                        data-modal-toggle="edit-perumahan-modal-{{ $perumahan->id_perumahan }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
            </div>
            <div class="p-6 max-h-[70vh] overflow-y-auto">
                <form action="{{ route('master-perumahan.update', $perumahan->id_perumahan) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Perumahan -->
                    <div class="mb-4">
                        <label for="nama_perumahan" class="block text-gray-700 font-medium">Nama Perumahan</label>
                        <input type="text" id="nama_perumahan" name="nama_perumahan"
                            value="{{ $perumahan->nama_perumahan }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Deskripsi Singkat -->
                    <div class="mb-4">
                        <label for="deskripsi_singkat" class="block text-gray-700 font-medium">Deskripsi Singkat</label>
                        <textarea id="deskripsi_singkat" name="deskripsi_singkat"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">{{ $perumahan->deskripsi_singkat }}</textarea>
                    </div>

                    <!-- Gambar Perumahan -->
                    <div class="mb-4">
                        <label for="gambar_perumahan" class="block text-gray-700 font-medium">Gambar Perumahan</label>
                        @if($perumahan->gambar_perumahan)
                        <img src="{{ asset('storage/Perumahan/' . $perumahan->gambar_perumahan) }}"
                            alt="Gambar Perumahan" class="w-full rounded-md mt-2 object-cover">
                        @endif
                        <input type="file" id="gambar_perumahan" name="gambar_perumahan"
                            class="w-full bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block p-2.5">
                    </div>

                    <!-- Gambar Jumbotron -->
                    <div class="mb-4">
                        <label for="gambar_jumbotron" class="block text-gray-700 font-medium">Gambar Jumbotron</label>
                        @if($perumahan->gambar_jumbotron)
                        <img src="{{ asset('storage/Perumahan/' . $perumahan->gambar_jumbotron) }}"
                            alt="Gambar Jumbotron" class="w-full rounded-md mt-2 object-cover">
                        @endif
                        <input type="file" id="gambar_jumbotron" name="gambar_jumbotron"
                            class="w-full bg-gray-50 border border-gray-300 sm:text-sm rounded-lg block p-2.5">

                    </div>

                    <!-- About Perumahan -->
                    <div class="mb-4">
                        <label for="about_perumahan_title" class="block text-gray-700 font-medium">Judul About
                            Perumahan</label>
                        <input type="text" id="about_perumahan_title" name="about_perumahan_title"
                            value="{{ $perumahan->about_perumahan_title }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="about_perumahan_sub_title" class="block text-gray-700 font-medium">Sub Judul About
                            Perumahan</label>
                        <input type="text" id="about_perumahan_sub_title" name="about_perumahan_sub_title"
                            value="{{ $perumahan->about_perumahan_sub_title }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="about_perumahan_content" class="block text-gray-700 font-medium">Konten About
                            Perumahan</label>
                        <textarea id="about_perumahan_content" name="about_perumahan_content"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">{{ $perumahan->about_perumahan_content }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="about_perumahan_image" class="block text-gray-700 font-medium">Gambar About
                            Perumahan</label>
                        @if($perumahan->about_perumahan_image)
                        <img src="{{ asset('storage/Perumahan/' . $perumahan->about_perumahan_image) }}"
                            alt="Gambar About Perumahan" class="w-full rounded-md mt-2 object-cover">
                        @endif
                        <input type="file" id="about_perumahan_image" name="about_perumahan_image"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                    </div>

                    <!-- Alasan Perumahan Content -->
                    <div class="mb-4">
                        <label for="alasan_perumahan_content" class="block text-gray-700 font-medium">Alasan Perumahan
                            Konten</label>
                        <textarea id="alasan_perumahan_content" name="alasan_perumahan_content"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">{{ $perumahan->alasan_perumahan_content }}</textarea>
                    </div>

                    <!-- About Perumahan Images -->
                    <div class="mb-4">
                        <label for="about_perumahan_image1" class="block text-gray-700 font-medium">Gambar About
                            Perumahan 1</label>
                        @if($perumahan->about_perumahan_image1)
                        <img src="{{ asset('storage/Perumahan/' . $perumahan->about_perumahan_image1) }}"
                            alt="Gambar About Perumahan 1" class="w-full rounded-md mt-2 object-cover">
                        @endif
                        <input type="file" id="about_perumahan_image1" name="about_perumahan_image1"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                    </div>

                    <div class="mb-4">
                        <label for="about_perumahan_image2" class="block text-gray-700 font-medium">Gambar About
                            Perumahan 2</label>

                        <input type="file" id="about_perumahan_image2" name="about_perumahan_image2"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                    </div>

                    <!-- Fasilitas Perumahan Title -->
                    <div class="mb-4">
                        <label for="fasilitas_perumahan_title" class="block text-gray-700 font-medium">Judul Fasilitas
                            Perumahan</label>
                        <input type="text" id="fasilitas_perumahan_title" name="fasilitas_perumahan_title"
                            value="{{ $perumahan->fasilitas_perumahan_title }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Pilihan Fasilitas -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Pilih Fasilitas:</label>
                        @foreach($fasilitas as $fasilitasItem)
                        <div class="flex items-center mb-2">
                            <input type="checkbox" name="fasilitas[]" value="{{ $fasilitasItem->id_fasilitas }}" {{
                                in_array($fasilitasItem->id_fasilitas,
                            $perumahan->fasilitas->pluck('id_fasilitas')->toArray()) ? 'checked' : '' }}
                            class="mr-2">
                            <span>{{ $fasilitasItem->nama_fasilitas }}</span>
                        </div>
                        @endforeach
                    </div>

                    <!-- Selected Facilities Display -->
                    <div class="mb-4">
                        <label class="block text-gray-700 font-medium">Fasilitas Terpilih:</label>
                        <ul class="list-disc pl-5">
                            @foreach($perumahan->fasilitas as $selectedFasilitas)
                            <li>{{ $selectedFasilitas->nama_fasilitas }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Maps Perumahan Section -->
                    <div class="mb-4">
                        <label for="maps_perumahan_sub_title" class="block text-gray-700 font-medium">Sub Judul Maps
                            Perumahan</label>
                        <input type="text" id="maps_perumahan_sub_title" name="maps_perumahan_sub_title"
                            value="{{ $perumahan->maps_perumahan_sub_title }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="maps_perumahan_content" class="block text-gray-700 font-medium">Konten Maps
                            Perumahan</label>
                        <textarea id="maps_perumahan_content" name="maps_perumahan_content"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">{{ $perumahan->maps_perumahan_content }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="maps_perumahan_image" class="block text-gray-700 font-medium">Gambar Maps
                            Perumahan</label>
                        @if($perumahan->maps_perumahan_image)
                        <img src="{{ asset('storage/Perumahan/' . $perumahan->maps_perumahan_image) }}"
                            alt="Gambar Maps Perumahan" class="w-full rounded-md mt-2 object-cover">
                        @endif
                        <input type="file" id="maps_perumahan_image" name="maps_perumahan_image"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">

                    </div>

                    <!-- Pembayaran Perumahan Section -->
                    <div class="mb-4">
                        <label for="pembayaran_perumahan_title" class="block text-gray-700 font-medium">Judul Pembayaran
                            Perumahan</label>
                        <input type="text" id="pembayaran_perumahan_title" name="pembayaran_perumahan_title"
                            value="{{ $perumahan->pembayaran_perumahan_title }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <div class="mb-4">
                        <label for="pembayaran_perumahan_content" class="block text-gray-700 font-medium">Konten
                            Pembayaran Perumahan</label>
                        <textarea id="pembayaran_perumahan_content" name="pembayaran_perumahan_content"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">{{ $perumahan->pembayaran_perumahan_content }}</textarea>
                    </div>

                    <!-- Penghargaan Title -->
                    <div class="mb-4">
                        <label for="penghargaan_title" class="block text-gray-700 font-medium">Judul Penghargaan</label>
                        <input type="text" id="penghargaan_title" name="penghargaan_title"
                            value="{{ $perumahan->penghargaan_title }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg">
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Edit Perumahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div id="delete-perumahan-modal-{{ $perumahan->id_perumahan }}" aria-hidden="true"
        class="fixed hidden inset-0 flex items-center justify-center z-50 overflow-y-auto bg-gray-800 bg-opacity-50">
        <div class="relative w-full max-w-lg mx-4 md:mx-0 bg-white rounded-lg shadow-lg">
            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Delete Perumahan
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="delete-perumahan-modal-{{ $perumahan->id_perumahan }}">
                    <i class="ri-close-line"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form class="p-6 space-y-4" action="{{ route('master-perumahan.destroy', $perumahan->id_perumahan) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <p class="text-sm text-gray-600">Are you sure you want to delete this perumahan?</p>
                <div class="flex justify-center">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg font-medium text-sm">
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

    @endforeach
</div>
<script>
    document.querySelectorAll("[data-modal-toggle]").forEach((button) => {
        button.addEventListener("click", function () {
            const modalId = this.getAttribute("data-modal-toggle");
            const modal = document.getElementById(modalId);
            modal.classList.toggle("hidden");
        });
    });
</script>

<!-- AlpineJS -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<!-- Font Awesome -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>


@endsection