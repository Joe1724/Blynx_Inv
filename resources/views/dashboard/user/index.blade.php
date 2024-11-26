@extends('layouts.app')

@section('title')
    Users
@endsection

@section('title-header')
    All Users
@endsection

@section('content')
    {{-- Alert Success --}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endif
    {{-- End Of Alert Success --}}

    <a href="{{ route('dashboard.users.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Create New User</a>

    {{-- Table --}}
    <div class="relative mt-4 overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">Id</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Role</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <td class="px-6 py-4">{{ $user->id }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            {{ $user->role == App\Models\Role::ADMIN ? 'Admin' : 'User' }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->id === auth()->id())
                                <span class="text-gray-500 dark:text-gray-400">N/A</span>
                            @else
                                <div class="flex gap-2">
                                    <a href="{{ route('dashboard.users.show', $user->id) }}" class="px-3 py-2 text-sm text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-800">View</a>
                                    @can('user-destroy', $user)
                                        <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 text-sm text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">Delete</button>
                                        </form>
                                    @endcan
                                    @can('user-edit-update', $user)
                                        <a href="{{ route('dashboard.users.edit', $user->id) }}" class="px-3 py-2 text-sm text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800">Edit</a>
                                    @endcan
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
    {{-- End Of Table --}}
@endsection
