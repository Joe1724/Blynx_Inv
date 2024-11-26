@extends('layouts.app')

@section('title')
    Product Detail
@endsection

@section('title-header')
    Product Detail
@endsection

@section('content')
    <a href="{{ route('dashboard.products.index') }}" class="px-4 py-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-600">
        Back
    </a>

    <div class="mt-6 space-y-6">
        {{-- Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input
                id="name"
                type="text"
                value="{{ $product->name }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of Name --}}

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea
                id="description"
                rows="6"
                disabled
                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
            >{{ $product->description }}</textarea>
        </div>
        {{-- End of Description --}}

        {{-- Price --}}
        <div>
            <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
            <input
                id="price"
                type="number"
                value="{{ $product->price }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of Price --}}

        {{-- Quantity In Stock --}}
        <div>
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity In Stock</label>
            <input
                id="quantity"
                type="number"
                value="{{ $product->quantity_in_stock }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of Quantity In Stock --}}

        {{-- Category --}}
        <div>
            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
            <input
                id="category"
                type="text"
                value="{{ $product->category->name }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of Category --}}

        {{-- User ID --}}
        <div>
            <label for="user-id" class="block text-sm font-medium text-gray-700">User ID</label>
            <input
                id="user-id"
                type="text"
                value="{{ $product->user_id }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of User ID --}}

        {{-- Created At --}}
        <div>
            <label for="created-at" class="block text-sm font-medium text-gray-700">Created At</label>
            <input
                id="created-at"
                type="text"
                value="{{ $product->created_at->diffForHumans() }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of Created At --}}

        {{-- Updated At --}}
        <div>
            <label for="updated-at" class="block text-sm font-medium text-gray-700">Updated At</label>
            <input
                id="updated-at"
                type="text"
                value="{{ $product->updated_at->diffForHumans() }}"
                disabled
                class="block mt-1 border-gray-300 rounded-md shadow-sm w-half focus:ring focus:ring-opacity-50"
            />
        </div>
        {{-- End of Updated At --}}
    </div>

@endsection
