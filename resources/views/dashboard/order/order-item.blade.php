@extends('layouts.app')

@section('title')
    Order Items
@endsection

@section('title-header')
    Order Items
@endsection

@section('content')
    {{-- <a href="{{ route('dashboard.orders.show', $order->id) }}"
       class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Back</a> --}}

    {{-- Table --}}
    {{-- <div class="mt-6 overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="px-4 py-3 text-left text-sm font-medium text-gray-700">#</th>
                    <th scope="col" class="px-4 py-3 text-left text-sm font-medium text-gray-700">Id</th>
                    <th scope="col" class="px-4 py-3 text-left text-sm font-medium text-gray-700">Quantity</th>
                    <th scope="col" class="px-4 py-3 text-left text-sm font-medium text-gray-700">Unit Price</th>
                    <th scope="col" class="px-4 py-3 text-left text-sm font-medium text-gray-700">Product Id</th>
                    <th scope="col" class="px-4 py-3 text-left text-sm font-medium text-gray-700">Order Id</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($orderItems as $item)
                    <tr>
                        <td class="px-4 py-3 text-sm text-gray-500">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $item->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $item->quantity }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">${{ number_format($item->unit_price, 2) }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $item->product_id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-900">{{ $order->id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        {{-- Pagination --}}
        {{-- <div class="px-4 py-3 bg-gray-50 border-t">
            {{ $orderItems->links('vendor.pagination.tailwind') }}
        </div>
    </div> --}}
    {{-- End Of Table --}}
@endsection
