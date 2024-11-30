@extends('layouts.guest')

@section('title')
    Login
@endsection

@section('content')
    <main class="w-full max-w-md mx-auto my-auto form-signin">
        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div class="space-y-6">
                <h1 class="mb-6 text-3xl font-semibold text-center">Orland Watch</h1>

                <!-- Email Input -->
                <div class="relative">
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="peer block w-full px-4 py-3 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                        placeholder="Email address" autocomplete="email" autofocus>
                    {{-- <label for="email" class="absolute left-4 top-2.5 text-gray-500 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:left-4 peer-focus:top-2.5">
                        Email address
                    </label> --}}

                    @error('email')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="relative">
                    <input id="password" type="password" name="password" required
                        class="peer block w-full px-4 py-3 mt-2 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                        placeholder="Password">
                    {{-- <label for="password" class="absolute left-4 top-2.5 text-gray-500 transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-sm peer-focus:text-blue-600 peer-focus:left-4 peer-focus:top-2.5">
                        Password
                    </label> --}}

                    @error('password')
                        <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Login Button -->
                <button class="w-full py-2 mt-6 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">
                    Log in
                </button>
            </div>
        </form>
    </main>
@endsection
