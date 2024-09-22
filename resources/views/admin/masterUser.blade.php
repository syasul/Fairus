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
    button[data-modal-toggle] i.ri-close-line {
    font-size: 1.5rem; /* Increase font size */
    input:focus {outline: none;}
    padding: 0.5rem; /* Increase padding */
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
                <h1 class="text-3xl text-black pb-6 text-bold">Master User</h1>
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
                            <i class="ri-list-check mr-2"></i> Table Example
                        </p>
                        <button data-modal-toggle="add-user-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 items-center py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            <i class="ri-add-line mr-3 text-lg"></i> Add User
                        </button>
                    </div>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Username</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Password</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @if ($users->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center py-3 px-4">
                                        Tidak ada User yang tersedia.
                                    </td>
                                </tr>
                                @else
                                @foreach ($users as $user)
                                <tr>
                                    <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center py-3 px-4">{{ $user->username }}</td>
                                    <td class="text-center py-3 px-4">{{ $user->text_password }}</td>
                                    <td class="text-center py-3 px-4">
                                        <div class="flex items-center justify-center gap-3">
                                            <button data-modal-toggle="edit-user-modal-{{ $user->id }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg">
                                                <i class="ri-edit-line"></i>
                                            </button>
                                            <button data-modal-toggle="delete-user-modal-{{ $user->id }}" class="bg-red-500 text-white px-2 py-1 rounded-lg">
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
                        {{ $users->appends(request()->input())->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add User Modal -->
    <div id="add-user-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-grey-900 ">
                        Add User
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1 ml-auto inline-flex items-center " data-modal-toggle="add-user-modal">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-user.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="username" class="text-sm font-medium text-gray-900 block mb-2 ">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Username" required>
                    </div>
                    <div>
                        <label for="password" class="text-sm font-medium text-gray-900 block mb-2 ">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Password" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Add User
                    </button>
                </form>
            </div>
        </div>
    </div>

    @foreach ($users as $user)
    <!-- Edit User Modal -->
    <div id="edit-user-modal-{{ $user->id }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-900 ">
                        Update User
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="edit-user-modal-{{ $user->id }}">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                
                    <!-- Field untuk username -->
                    <div>
                        <label for="username" class="text-sm font-medium text-gray-900 block mb-2">Username</label>
                        <input type="text" name="username" id="username" value="{{ $user->username }}" class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full" required>
                    </div>
                
                    <!-- Field untuk text_password -->
                    <div>
                        <label for="password" class="text-sm font-medium text-gray-900 block mb-2">Password</label>
                        <input type="text" name="text_password" id="password" value="{{ $user->text_password }}" class="bg-gray-50 border border-gray-300 rounded-lg p-2.5 w-full">
                    </div>
                
                    <button type="submit" class="w-full bg-blue-700 text-white p-2.5 rounded-lg">Update User</button>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div id="delete-user-modal-{{ $user->id }}" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <div class="bg-white rounded-lg shadow relative ">
                <div class="flex justify-between items-center p-4 border-b">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Delete User
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-toggle="delete-user-modal-{{ $user->id }}">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="{{ route('master-user.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    
                    <p>Are you sure you want to delete this user?</p>
                    <button type="submit" class="bg-red-500 text-white p-2.5 rounded-lg w-full">Delete User</button>
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
