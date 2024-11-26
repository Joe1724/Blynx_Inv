@extends('layouts.app')

@section('title')
    Create New Order Item
@endsection

@section('title-header')
    Create New Order Item
@endsection

@section('content')
    <a href="{{ route('dashboard.order-items.index') }}"
       class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Back</a>

    <div class="mt-6">
        <form class="flex flex-col gap-4" method="POST" action="{{ route('dashboard.order-items.store') }}">
            @csrf

            {{-- Quantity --}}
            <div class="relative">
                <input id="quantity" type="number"
                       class="peer block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('quantity') border-red-500 @enderror"
                       name="quantity" required autocomplete="quantity" autofocus
                       placeholder=" " value="{{ old('quantity') }}">
                <label for="quantity"
                       class="absolute left-3 top-2.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-4
                       peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-blue-500">
                    Quantity
                </label>

                @error('quantity')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Quantity --}}

            {{-- Product Id --}}
            <div class="relative">
                <input id="product_id" type="number"
                       class="peer block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('product_id') border-red-500 @enderror"
                       name="product_id" required autocomplete="product_id"
                       placeholder=" " value="{{ old('product_id') }}">
                <label for="product_id"
                       class="absolute left-3 top-2.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-4
                       peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-blue-500">
                    Product Id
                </label>

                @error('product_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Product Id --}}

            {{-- Order Id --}}
            <div class="relative">
                <input id="order_id" type="number"
                       class="peer block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('order_id') border-red-500 @enderror"
                       name="order_id" required autocomplete="order_id"
                       placeholder=" " value="{{ old('order_id') }}">
                <label for="order_id"
                       class="absolute left-3 top-2.5 text-sm text-gray-500 transition-all peer-placeholder-shown:top-4
                       peer-placeholder-shown:text-gray-400 peer-focus:top-2.5 peer-focus:text-blue-500">
                    Order Id
                </label>

                @error('order_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Order Id --}}

            {{-- Button Submit --}}
            <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Save
            </button>
            {{-- End Of Button Submit --}}
        </form>
    </div>
@endsection
