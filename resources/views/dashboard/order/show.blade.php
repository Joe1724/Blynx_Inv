@extends('layouts.app')

@section('title')
    Order Detail
@endsection

@section('title-header')
    Order Detail
@endsection

@section('content')
    <a href="{{ route('dashboard.orders.index') }}"
       class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Back</a>

    <div class="mt-6 space-y-4">
        {{-- Customer Name --}}
        <div>
            <label for="customer-name" class="block mb-2 text-sm font-medium text-gray-700">Customer Name</label>
            <input type="text" id="customer-name"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="{{ $order->customer_name }}" disabled>
        </div>

        {{-- Customer Email --}}
        <div>
            <label for="customer-email" class="block mb-2 text-sm font-medium text-gray-700">Customer Email</label>
            <input type="text" id="customer-email"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="{{ $order->customer_email }}" disabled>
        </div>

        {{-- Date --}}
        <div>
            <label for="date" class="block mb-2 text-sm font-medium text-gray-700">Date</label>
            <input type="text" id="date"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="{{ $order->date }}" disabled>
        </div>

        {{-- Total Price --}}
        <div>
            <label for="total-price" class="block mb-2 text-sm font-medium text-gray-700">Total Price</label>
            <input type="text" id="total-price"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="${{ number_format($order->total_price, 2) }}" disabled>
        </div>

        {{-- User Id --}}
        <div>
            <label for="user-id" class="block mb-2 text-sm font-medium text-gray-700">User Id</label>
            <input type="text" id="user-id"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="{{ $order->user_id }}" disabled>
        </div>

        {{-- Order Items --}}
        {{-- <div>
            <label for="order-items" class="block mb-2 text-sm font-medium text-gray-700">Order Items</label>
            <div class="flex items-center">
                <input type="text" id="order-items"
                       class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-l-lg text-gray-500 cursor-not-allowed"
                       value="{{ $order->orderItems->count() }}" disabled>
                <a href="{{ route('dashboard.orders.orderItems', $order->id) }}"
                   class="px-4 py-2 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700">
                    View more
                </a>
            </div>
        </div> --}}

        {{-- Created At --}}
        <div>
            <label for="created-at" class="block mb-2 text-sm font-medium text-gray-700">Created At</label>
            <input type="text" id="created-at"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="{{ $order->created_at->diffForHumans() }}" disabled>
        </div>

        {{-- Updated At --}}
        <div>
            <label for="updated-at" class="block mb-2 text-sm font-medium text-gray-700">Updated At</label>
            <input type="text" id="updated-at"
                   class="w-full p-2.5 bg-gray-100 border border-gray-300 rounded-lg text-gray-500 cursor-not-allowed"
                   value="{{ $order->updated_at->diffForHumans() }}" disabled>
        </div>
    </div>
@endsection
