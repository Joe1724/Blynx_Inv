@extends('layouts.app')

@section('title')
    Update Category
@endsection

@section('title-header')
    Update Category
@endsection

@section('content')
    <a href="{{ route('dashboard.categories.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
        Back
    </a>

    <div class="mt-6">
        <form method="POST" action="{{ route('dashboard.categories.update', $category->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

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
                    value="{{ old('name', $category->name) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Name --}}

            {{-- Button Submit --}}
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
                Save
            </button>
            {{-- End of Button Submit --}}
        </form>
    </div>
@endsection
