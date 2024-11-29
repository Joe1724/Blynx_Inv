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
        <form class="gap-3 d-flex flex-column" method="POST" action="{{ route('dashboard.order-items.store') }}">
            @csrf

            {{-- Quantity --}}
<<<<<<< HEAD
            <div class="relative">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input id="quantity" type="number"
                       class="peer block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('quantity') border-red-500 @enderror"
                       name="quantity" required autocomplete="quantity" autofocus
                       placeholder=" " value="{{ old('quantity') }}">
=======
            <div class="form-floating">
                <input id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror"
                    name="quantity" required autocomplete="quantity" autofocus placeholder="Quantity"
                    value="{{ old('quantity') }}">
                <label for="quantity">Quantity</label>
>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08

                @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
            <div class="form-floating">
                <input id="product_id" type="number" step="any"
                    class="form-control @error('product_id') is-invalid @enderror" name="product_id" required
                    autocomplete="product_id" autofocus placeholder="Product Id" value="{{ old('product_id') }}">
                <label for="product_id">Product Id</label>

                @error('product_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- End Of Product Id --}}

            {{-- Order Id --}}
            <div class="form-floating">
                <input id="order_id" type="number" step="any"
                    class="form-control @error('order_id') is-invalid @enderror" name="order_id" required
                    autocomplete="order_id" autofocus placeholder="Order Id" value="{{ old('order_id') }}">
                <label for="order_id">Order Id</label>

                @error('order_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- End Of Order Id --}}

>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08
            {{-- Button Submit --}}
            <button class="py-2 btn btn-primary w-100" type="submit">Save</button>
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
