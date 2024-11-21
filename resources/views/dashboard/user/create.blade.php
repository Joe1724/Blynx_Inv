@extends('layouts.app')

@section('title')
    Create New User
@endsection

@section('title-header')
    Create New User
@endsection

@section('content')
    <a href="{{ route('dashboard.users.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
        Back
    </a>

    <div class="mt-6">
        <form method="POST" action="{{ route('dashboard.users.store') }}" class="space-y-6">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 @error('name') border-red-500 @enderror"
                />
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End of Name --}}

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 @error('email') border-red-500 @enderror"
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End of Email --}}

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End of Password --}}

            {{-- Confirm Password --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 @error('password') border-red-500 @enderror"
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End of Confirm Password --}}

            {{-- Submit Button --}}
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded shadow-sm"
                >
                    Save
                </button>
            </div>
            {{-- End of Submit Button --}}
        </form>
    </div>
@endsection
