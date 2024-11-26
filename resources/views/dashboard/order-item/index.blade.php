@extends('layouts.app')

@section('title')
    Order Items
@endsection

@section('title-header')
    All Order Items
@endsection

@section('content')
    {{-- Alert Danger --}}
    @if (session('error'))
        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            {{ session('error') }}
        </div>
    @endif
    {{-- End Of Alert Danger --}}

    {{-- Alert Success --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- End Of Alert Success --}}

    <a href="{{ route('dashboard.order-items.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Create New Order Item</a>

    {{-- Table --}}
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Quantity</th>
                    <th scope="col" class="px-6 py-3">Unit Price</th>
                    <th scope="col" class="px-6 py-3">Product Id</th>
                    <th scope="col" class="px-6 py-3">Order Id</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orderItems as $item)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">{{ $item->id }}</td>
                        <td class="px-6 py-4">{{ $item->quantity }}</td>
                        <td class="px-6 py-4">${{ number_format($item->unit_price) }}</td>
                        <td class="px-6 py-4">{{ $item->product_id }}</td>
                        <td class="px-6 py-4">{{ $item->order_id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <a href="{{ route('dashboard.order-items.show', $item->id) }}"
                                   class="px-3 py-2 text-sm text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-800">View</a>
                                <form action="{{ route('dashboard.order-items.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                        Delete
                                    </button>
                                </form>
                                <a href="{{ route('dashboard.order-items.edit', $item->id) }}"
                                   class="px-3 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $orderItems->links() }}
    </div>
    {{-- End Of Table --}}
@endsection



