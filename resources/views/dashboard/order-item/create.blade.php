@extends('layouts.app')

@section('title')
    Create New Order Item
@endsection

@section('title-header')
    Create New Order Item
@endsection

@section('content')
    <a href="{{ route('dashboard.order-items.index') }}" class="btn btn-primary">Back</a>

    <div class="mt-4">
        <form class="flex-col gap-3 d-flex" method="POST" action="{{ route('dashboard.order-items.store') }}">
            @csrf

            {{-- Quantity --}}
            <div class="form-floating">
                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"
                    name="quantity" required autocomplete="quantity" autofocus placeholder="Quantity"
                    value="{{ old('quantity') }}">
>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08

                @error('quantity')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Quantity --}}

<<<<<<< HEAD
            {{-- Category --}}
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id" required class="block w-full p-2 border rounded-md">
                    <option value="" disabled selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- End Of Category --}}

            {{-- Product Id --}}
            <div class="mb-4">
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                <select id="product_id" name="product_id" required class="block w-full p-2 border rounded-md">
                    <option value="" disabled selected>Select a product</option>
                </select>
            </div>
            {{-- End Of Product Id --}}

=======
            {{-- Product Id --}}
            <div class="mb-4">
                <label for="product_id" class="block text-sm font-medium text-gray-700">Product Id</label>
                <input id="product_id" type="number" step="any"
                    class="form-input @error('product_id') border-red-500 @enderror"
                    name="product_id" required autocomplete="product_id" placeholder="Product Id"
                    value="{{ old('product_id') }}">

                @error('product_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Product Id --}}

            {{-- Order Id --}}
            <div class="mb-4">
                <label for="order_id" class="block text-sm font-medium text-gray-700">Order Id</label>
                <input id="order_id" type="number" step="any"
                    class="form-input @error('order_id') border-red-500 @enderror"
                    name="order_id" required autocomplete="order_id" placeholder="Order Id"
                    value="{{ old('order_id') }}">

                @error('order_id')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Order Id --}}

>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08
            {{-- Button Submit --}}
            <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Save
            </button>
            {{-- End Of Button Submit --}}
        </form>
    </div>

    {{-- JavaScript to Filter Products --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categorySelect = document.getElementById('category_id');
            const productSelect = document.getElementById('product_id');

            // Event listener for category change
            categorySelect.addEventListener('change', function () {
                const categoryId = this.value;

                // Clear existing options
                productSelect.innerHTML = '<option value="" disabled selected>Select a product</option>';

                // If a category is selected, fetch products for that category
                if (categoryId) {
                    fetch(`/get-products/${categoryId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate product select with fetched products
                            data.products.forEach(product => {
                                const option = document.createElement('option');
                                option.value = product.id;
                                option.textContent = product.name;
                                productSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching products:', error));
                }
            });
        });
    </script>
@endsection
