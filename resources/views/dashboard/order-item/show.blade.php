@extends('layouts.app')

@section('title')
    Detail Order Item
@endsection

@section('title-header')
    Detail Order Item
@endsection

@section('content')
    <a href="{{ route('dashboard.order-items.index') }}"
       class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
        Back
    </a>

    <div class="mt-4 space-y-4">
        {{-- Quantity --}}
        <div>
            <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Quantity</label>
            <input type="number" id="quantity" name="quantity"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                   value="{{ $orderItem->quantity }}" disabled>
        </div>

        {{-- Product ID --}}
        <div>
            <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900">Product ID</label>
            <input type="number" id="product_id" name="product_id"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                   value="{{ $orderItem->product_id }}" disabled>
        </div>

        {{-- Order ID --}}
        {{-- <div>
            <label for="order_id" class="block mb-2 text-sm font-medium text-gray-900">Order ID</label>
            <input type="number" id="order_id" name="order_id"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                   value="{{ $orderItem->order_id }}" disabled>
        </div> --}}

        {{-- Unit Price --}}
        <div>
            <label for="unit_price" class="block mb-2 text-sm font-medium text-gray-900">Unit Price</label>
            <input type="number" id="unit_price" name="unit_price"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                   value="{{ $orderItem->unit_price }}" disabled>
        </div>

        {{-- Created At --}}
        <div>
            <label for="created-at" class="block mb-2 text-sm font-medium text-gray-900">Created At</label>
            <input type="text" id="created-at" name="created-at"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                   value="{{ $orderItem->created_at->diffForHumans() }}" disabled>
        </div>

        {{-- Updated At --}}
        <div>
            <label for="updated-at" class="block mb-2 text-sm font-medium text-gray-900">Updated At</label>
            <input type="text" id="updated-at" name="updated-at"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                   value="{{ $orderItem->updated_at->diffForHumans() }}" disabled>
        </div>
    </div>
@endsection
