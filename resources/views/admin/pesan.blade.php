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
                <h1 class="text-3xl text-black pb-6 text-bold">Master User</h1>

                <div class="w-full mt-6 ">
                    <div class="flex justify-between mb-5">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-list mr-3"></i> Pesan
                        </p>
                        <button @click="openModal = true" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                            Toggle modal
                        </button>
                    </div>
                    
                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">First Name</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Last Name</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Email</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Phone Number</td>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Message</td>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Date Created</td>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                <tr>
                                    <td class="text-center py-3 px-4">First Name</td>
                                    <td class="text-center py-3 px-4">Last Name</td>
                                    <td class="text-center py-3 px-4">Email</td>
                                    <td class="text-center py-3 px-4">Phone Number</td>
                                    <td class="text-center py-3 px-4">Message</td>
                                    <td class="text-center py-3 px-4">Date Created</td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </main>
    
           
        </div>
        
    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
   </div>
   
@endsection