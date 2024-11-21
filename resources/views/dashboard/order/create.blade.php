@extends('layouts.app')

@section('title')
    Create New Order
@endsection

@section('title-header')
    Create New Order
@endsection

@section('content')
    <a href="{{ route('dashboard.orders.index') }}" class="px-4 py-2 font-medium text-white bg-blue-500 rounded hover:bg-blue-600">Back</a>

    <div class="mt-4">
        <form class="space-y-4" method="POST" action="{{ route('dashboard.orders.store') }}">
            @csrf

            {{-- Customer Name --}}
            <div class="form-floating">
                <input id="customer_name" type="text"
                    class="form-input @error('customer_name') border-red-500 @enderror"
                    name="customer_name" required autocomplete="customer_name" autofocus
                    placeholder="Customer Name" value="{{ old('customer_name') }}">
                <label for="customer_name">Customer Name</label>

                @error('customer_name')
                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            {{-- End Of Customer Name --}}

            {{-- Customer Email --}}
            <div class="form-floating">
                <input id="customer_email" type="email"
                    class="form-input @error('customer_email') border-red-500 @enderror"
                    name="customer_email" required autocomplete="customer_email" autofocus
                    placeholder="Customer Email" value="{{ old('customer_email') }}">
                <label for="customer_email">Customer Email</label>

                @error('customer_email')
                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            {{-- End Of Customer Email --}}

            {{-- Date --}}
            <div class="form-floating">
                <input id="date" type="date"
                    class="form-input @error('date') border-red-500 @enderror"
                    name="date" required autocomplete="date" autofocus placeholder="Date"
                    value="{{ old('date') }}">
                <label for="date">Date</label>

                @error('date')
                    <div class="mt-1 text-sm text-red-500">{{ $message }}</div>
                @enderror
            </div>
            {{-- End Of Date --}}

            {{-- Button Submit --}}
            <button class="w-full px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600" type="submit">Save</button>
            {{-- End Of Button Submit --}}
        </form>
    </div>
@endsection
