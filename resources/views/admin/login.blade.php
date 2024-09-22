@extends('base')

@section('head')
    <title>Fairus | Login</title>
    <style>
        input:focus {
            outline: none;
        }
    </style>
@endsection

@section('body')
<div class="flex min-h-screen items-center justify-center px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <div class="text-center">
      <img class="mx-auto h-10 w-auto" src="{{ asset('images/logo.png')}}" alt="Your Company">
      <h2 class="mt-5 text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
    </div>

    <form class="space-y-6 mt-6" method="POST" action="{{ route('auth.login') }}">
      @csrf
      <div>
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
        <input id="username" name="username" type="text" placeholder="username" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
      </div>

      <div>
        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
        <input id="password" name="password" type="password" placeholder="password" required class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5">
      </div>
      @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>
  </div>
</div>
@endsection
