@extends('base')
@section('head')
<title>Fairus | Admin Page</title>
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
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
                <h1 class="text-3xl text-black pb-6 text-bold">Message</h1>

                <div class="w-full mt-6">
                    <div class="flex justify-between mb-5">
                        <p class="text-xl pb-3 flex items-center">
                            <i class="ri-list-check mr-2"></i> Table Example
                        </p>
                        
                    </div>

                    <div class="bg-white overflow-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">No</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">First Name</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Last Name</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Email</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Phone Number</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Message</th>
                                    <th class="py-3 px-4 uppercase font-semibold text-sm text-center">Created At</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($messages as $message)
                                <tr>
                                    <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center py-3 px-4">{{ $message->firstName }}</td>
                                    <td class="text-center py-3 px-4">{{ $message->lastName }}</td>
                                    <td class="text-center py-3 px-4">{{ $message->email }}</td>
                                    <td class="text-center py-3 px-4">{{ $message->phoneNumber }}</td>
                                    <td class="text-center py-3 px-4">{{ $message->message }}</td>
                                    <td class="text-center py-3 px-4">{{ $message->created_at->format('d-m-Y H:i') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $messages->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
@endsection
