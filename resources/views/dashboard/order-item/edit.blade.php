@extends('layouts.app')

@section('title')
    Update Order Item
@endsection

@section('title-header')
    Update Order Item
@endsection

@section('content')
    <a href="{{ route('dashboard.order-items.index') }}"
       class="inline-block px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
        Back
    </a>

    <div class="mt-4">
        <form method="POST" action="{{ route('dashboard.order-items.update', $orderItem->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            {{-- Quantity --}}
            <div>
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900">Quantity</label>
                <input type="number" id="quantity" name="quantity"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('quantity') border-red-500 @enderror"
                       placeholder="Enter quantity" required value="{{ old('quantity', $orderItem->quantity) }}">
                @error('quantity')
                    <p class="mt-2 text-sm text-red-600"><strong>{{ $message }}</strong></p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <button type="submit"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Save
            </button>
        </form>
    </div>
@endsection
