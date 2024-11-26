@extends('layouts.app')

@section('title')
    Create New Category
@endsection

@section('title-header')
    Create New Category
@endsection

@section('content')
    <a href="{{ route('dashboard.categories.index') }}" class="px-4 py-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
        Back
    </a>

    <div class="mt-6">
        <form method="POST" action="{{ route('dashboard.categories.store') }}" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    required
                    autocomplete="name"
                    autofocus
                    placeholder="Enter category name"
                    value="{{ old('name') }}"
                    class="mt-1 block w-half rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Name --}}

            {{-- Button Submit --}}
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md w-half hover:bg-blue-600">
                Save
            </button>
            {{-- End of Button Submit --}}
        </form>
    </div>
@endsection
