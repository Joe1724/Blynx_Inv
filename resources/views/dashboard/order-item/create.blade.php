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
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input id="quantity" type="number" class="form-input @error('quantity') border-red-500 @enderror"
                    name="quantity" required autocomplete="quantity" autofocus placeholder="Quantity"
                    value="{{ old('quantity') }}">

                @error('quantity')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Quantity --}}

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

            {{-- Button Submit --}}
            <button type="submit" class="w-full py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Save
            </button>
            {{-- End Of Button Submit --}}
        </form>
    </div>
@endsection
