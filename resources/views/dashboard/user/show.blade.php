@extends('layouts.app')

@section('title')
    User Detail
@endsection

@section('title-header')
    User Detail
@endsection

@section('content')
    <a href="{{ route('dashboard.users.index') }}" class="px-4 py-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
        Back
    </a>

    <div class="mt-6 space-y-6">
        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input
                id="name"
                type="text"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                value="{{ $user->name }}"
                disabled
            />
        </div>
        {{-- End of Name --}}

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input
                id="email"
                type="email"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                value="{{ $user->email }}"
                disabled
            />
        </div>
        {{-- End of Email --}}



        {{-- Created At --}}
        <div>
            <label for="created-at" class="block text-sm font-medium text-gray-700">Created At</label>
            <input
                id="created-at"
                type="text"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                value="{{ $user->created_at->diffForHumans() }}"
                disabled
            />
        </div>
        {{-- End of Created At --}}

        {{-- Updated At --}}
        <div>
            <label for="updated-at" class="block text-sm font-medium text-gray-700">Updated At</label>
            <input
                id="updated-at"
                type="text"
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                value="{{ $user->updated_at->diffForHumans() }}"
                disabled
            />
        </div>
        {{-- End of Updated At --}}
    </div>
@endsection
