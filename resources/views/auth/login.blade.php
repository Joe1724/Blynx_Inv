@extends('layouts.guest')

@section('title')
    Login
@endsection

@section('content')
    <main class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white rounded-md shadow-md">
            <div class="mb-6 text-center">
                <img src="/images/orland.png" alt="Logo" class="h-auto mx-auto w-30">
            </div>

            <form method="POST" action="{{ route('login.store') }}">
                @csrf

                <div class="space-y-6">
                    <!-- Email Input -->
                    <div class="relative">
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="peer block w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('email') border-red-500 @enderror"
                            placeholder="Email address" autocomplete="email" autofocus>
                        @error('email')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="relative">
                        <input id="password" type="password" name="password" required
                            class="peer block w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent @error('password') border-red-500 @enderror"
                            placeholder="Password">
                        @error('password')
                            <span class="mt-1 text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Login Button -->
                    <button class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500" type="submit">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </main>
@endsection
