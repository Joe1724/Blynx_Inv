@extends('layouts.app')

@section('title')
    Products
@endsection

@section('title-header')
    All Products
@endsection

@section('content')
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- End Of Alert Success --}}

    <a href="{{ route('dashboard.products.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Create New Product</a>

    {{-- Filter --}}
    <form action="{{ route('dashboard.products.index') }}" method="GET" class="mt-4">
        {{-- Categories --}}
        <div class="mb-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Choose Category</label>
            <select id="category" name="category" class="block w-64 p-2.5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" onchange="this.form.submit()">
                @foreach ($categories as $category)
                    <option value="{{ $category['name'] }}" {{ request()->input('category') == $category['name'] ? 'selected' : '' }}>
                        {{ $category['name'] }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- End Of Categories --}}
    </form>
    {{-- End Of Filter --}}

    {{-- Table --}}
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Quantity In Stock</th>
                    <th scope="col" class="px-6 py-3">Category</th>
                    <th scope="col" class="px-6 py-3">Order Items</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
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
                                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">Delete</button>
                                </form>
                                <a href="{{ route('dashboard.products.edit', $product->id) }}" class="px-3 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Edit</a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
    {{-- End Of Table --}}
@endsection
