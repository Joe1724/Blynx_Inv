@extends('layouts.app')

@section('title')
    Update Order
@endsection

@section('title-header')
    Update Order
@endsection

@section('content')
    <a href="{{ route('dashboard.orders.index') }}"
       class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Back</a>

    <div class="mt-6">
        <form class="flex flex-col gap-4" method="POST" action="{{ route('dashboard.orders.update', $order->id) }}">
            @csrf
            @method('PUT')

            {{-- Customer Name --}}
            <div>
                <input id="customer_name" type="text"
                       class="block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('customer_name') border-red-500 @enderror"
                       name="customer_name" required autocomplete="customer_name" autofocus
                       placeholder="Customer Name" value="{{ old('customer_name', $order->customer_name) }}">

                @error('customer_name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Customer Name --}}

            {{-- Customer Email --}}
            <div>
                <input id="customer_email" type="email"
                       class="block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('customer_email') border-red-500 @enderror"
                       name="customer_email" required autocomplete="customer_email"
                       placeholder="Customer Email" value="{{ old('customer_email', $order->customer_email) }}">

                @error('customer_email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Customer Email --}}

            {{-- Date --}}
            <div>
                <input id="date" type="date"
                       class="block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500
                       focus:outline-none @error('date') border-red-500 @enderror"
                       name="date" required autocomplete="date"
                       placeholder="Date" value="{{ old('date', substr($order->date, 0, 10)) }}">

                @error('date')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            {{-- End Of Date --}}

            {{-- Button Submit --}}
            <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Save
            </button>
            {{-- End Of Button Submit --}}
        </form>
    </div>
@endsection
