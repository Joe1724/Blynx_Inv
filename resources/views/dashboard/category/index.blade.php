@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('title-header')
    All Categories
@endsection

@section('content')
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- End Of Alert Success --}}

    <a href="{{ route('dashboard.categories.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Create New Category</a>

    {{-- Table --}}
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Products</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">{{ $category->id }}</td>
                        <td class="px-6 py-4">{{ $category->name }}</td>
                        <td class="px-6 py-4">{{ $category->products->count() }}</td>
                        <td class="flex items-center gap-2 px-6 py-4">
                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">
                                    Delete
                                </button>
                            </form>
                            <a href="{{ route('dashboard.categories.edit', $category->id) }}" class="px-3 py-1 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
    {{-- End Of Table --}}
@endsection
