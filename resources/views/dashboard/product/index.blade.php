@extends('layouts.app')

@section('title')
    Products
@endsection

@section('title-header')
    All Products
@endsection

@section('content')
    {{-- Alert for Success Messages --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert for Low Stock --}}
    @php
        $lowStockThreshold = 5; // Define low-stock threshold
        $lowStockProducts = $products->filter(function($product) use ($lowStockThreshold) {
            return $product->quantity_in_stock <= $lowStockThreshold;
        });
    @endphp

    @if ($lowStockProducts->count() > 0)
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <strong>Warning!</strong> There are {{ $lowStockProducts->count() }} product(s) with low stock:
            <ul class="mt-2 list-disc list-inside">
                @foreach ($lowStockProducts as $lowStockProduct)
                    <li>{{ $lowStockProduct->name }} (Stock: {{ $lowStockProduct->quantity_in_stock }})</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Add Product and Search Bar --}}
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('dashboard.products.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
            Create New Product
        </a>

        {{-- Search Form --}}
        <form action="{{ route('dashboard.products.index') }}" method="GET" class="flex items-center">
            <input
                type="text"
                name="search"
                placeholder="Search products..."
                value="{{ request()->input('search') }}"
                class="px-4 py-2 text-sm border border-gray-300 rounded-l-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
            />
            <button
                type="submit"
                class="px-4 py-2 text-sm text-white bg-blue-600 rounded-r-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800"
            >
                Search
            </button>
        </form>
    </div>

    {{-- Filter --}}
    <form action="{{ route('dashboard.products.index') }}" method="GET" class="mt-4">
        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Filter by Category</label>
            <select id="category" name="category" class="block w-64 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" onchange="this.form.submit()">
                <option value="" {{ request()->input('category') == null ? 'selected' : '' }}>All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['name'] }}" {{ request()->input('category') == $category['name'] ? 'selected' : '' }}>
                        {{ $category['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    {{-- Product Table --}}
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Quantity In Stock</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Order Items</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                    <th scope="col" class="px-6 py-3">Status</th> {{-- New Status Column --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $product->id }}</td>
                        <td class="px-6 py-4">{{ $product->name }}</td>
                        <td class="px-6 py-4">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4">{{ $product->quantity_in_stock }}</td>
                        <td class="px-6 py-4">{{ $product->category->name }}</td>
                        <td class="px-6 py-4">{{ $product->orderItems->count() }}</td>
                        <td class="flex gap-2 px-6 py-4">
                            <a href="{{ route('dashboard.products.show', $product->id) }}" class="px-3 py-2 text-sm text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-800">View</a>
                            @can('product-edit-update-destroy', $product)
                                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">Delete</button>
                                </form>
                                <a href="{{ route('dashboard.products.edit', $product->id) }}" class="px-3 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Edit</a>
                            @endcan
                        </td>
                        {{-- Status Column --}}
                        <td class="px-6 py-4">
                            @if ($product->quantity_in_stock > $lowStockThreshold)
                                <span class="px-2 py-1 text-sm text-white bg-green-500 rounded-lg">In Stock</span>
                            @elseif ($product->quantity_in_stock > 0)
                                <span class="px-2 py-1 text-sm text-white bg-red-800 rounded-lg">Low Stock</span>
                            @else
<<<<<<< HEAD
                                <span class="px-2 py-1 text-sm text-white bg-black rounded-lg"> Out of Stock</span>
=======
                                <span class="px-2 py-1 text-sm text-white bg-black rounded-lg">Out of Stock</span>
>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                            No products found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
