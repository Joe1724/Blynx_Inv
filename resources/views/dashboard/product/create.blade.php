@extends('layouts.app')

@section('title')
    Create New Product
@endsection

@section('title-header')
    Create New Product
@endsection

@section('content')
    <a href="{{ route('dashboard.products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded">
        Back
    </a>

    <div class="mt-6">
        <form method="POST" action="{{ route('dashboard.products.store') }}" class="space-y-6">
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
                    placeholder="Enter product name"
                    value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Name --}}

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    required
                    autocomplete="description"
                    placeholder="Enter product description"
                    rows="6"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Description --}}

            {{-- Price --}}
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input
                    id="price"
                    type="number"
                    name="price"
                    required
                    autocomplete="price"
                    placeholder="Enter product price"
                    step="any"
                    value="{{ old('price') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('price') border-red-500 @enderror"
                >
                @error('price')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Price --}}

            {{-- Quantity In Stock --}}
            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity In Stock</label>
                <input
                    id="quantity"
                    type="number"
                    name="quantity"
                    required
                    autocomplete="quantity"
                    placeholder="Enter quantity in stock"
                    value="{{ old('quantity') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('quantity') border-red-500 @enderror"
                >
                @error('quantity')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Quantity In Stock --}}

            {{-- Categories --}}
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Choose Category</label>
                <select
                    id="category"
                    name="category"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 @error('category') border-red-500 @enderror"
                >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="mt-2 text-sm text-red-600">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            {{-- End of Categories --}}

            {{-- Button Submit --}}
            <button
                type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md"
            >
                Save
            </button>
            {{-- End of Button Submit --}}
        </form>
    </div>
@endsection
