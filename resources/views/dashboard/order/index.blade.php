@extends('layouts.app')

@section('title')
    Orders
@endsection

@section('title-header')
    All Orders
@endsection

@section('content')
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-white bg-green-500 rounded-lg">
            {{ session('success') }}
        </div>
    @endif
    {{-- End Of Alert Success --}}

    <a href="{{ route('dashboard.orders.create') }}" class="inline-block px-4 py-2 mb-4 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">
        Create New Order
    </a>

    {{-- Table --}}
    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="text-left bg-gray-100">
                    <th class="px-4 py-2 border-b">Id</th>
                    <th class="px-4 py-2 border-b">Customer Name</th>
                    <th class="px-4 py-2 border-b">Customer Email</th>
                    <th class="px-4 py-2 border-b">Total Price</th>
                    <th class="px-4 py-2 border-b">Order Items</th>
                    <th class="px-4 py-2 border-b">Date</th>
                    <th class="px-4 py-2 border-b">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $order->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->customer_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->customer_email }}</td>
                        <td class="px-4 py-2 border-b">${{ number_format($order->total_price, 2) }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->orderItems->count() }}</td>
                        <td class="px-4 py-2 border-b">{{ $order->date }}</td>
                        <td class="flex gap-2 px-4 py-2 border-b">
                            <a href="{{ route('dashboard.orders.show', $order->id) }}" class="px-3 py-1 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                                View
                            </a>
                            @can('order-edit-update-delete', $order)
                                <form action="{{ route('dashboard.orders.destroy', $order->id) }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('dashboard.orders.edit', $order->id) }}" class="px-3 py-1 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                                    Edit
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $orders->links('vendor.pagination.tailwind') }}
        </div>
    </div>
    {{-- End Of Table --}}
@endsection
