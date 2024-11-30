<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Flowbite Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="text-white bg-gray-900 shadow-md">
        <div class="flex items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="" class="text-2xl font-semibold">
                Orland Watch
            </a>

            <div class="flex items-center space-x-4">
                <button data-collapse-toggle="navbar-default" type="button" class="text-white focus:outline-none">
                    <i class="text-xl bi bi-list"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="flex">
        <div class="w-64 min-h-screen text-white bg-gray-800">
            <div class="p-4">
                <ul class="space-y-4">
                    <!-- Shared Items -->
                    @if (auth()->user()->role !== App\Models\Role::MODERATOR)
    <li>
        <a href="{{ route('dashboard.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-black">
            <svg class="w-5 h-5 text-gray-500 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
            </svg>
            <span class="ms-3">Dashboard</span>
        </a>
    </li>
@endif


                    <li>
                        <a href="{{ route('dashboard.categories.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-black">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="ms-3">Categories</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.products.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-black">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="ms-3">Products</span>
                        </a>
                    </li>

                    <!-- Moderator & Admin Links -->
                    @if (auth()->user()->role === App\Models\Role::MODERATOR || auth()->user()->role === App\Models\Role::ADMIN)
                    <li>
                        <a href="{{ route('dashboard.orders.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-black">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z" />
                            </svg>
                            <span class="ms-3">Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.order-items.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-black">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 21H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h3l2-2h4l2 2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2ZM15 11h.01M12 11h.01M9 11h.01" />
                            </svg>
                            <span class="ms-3">Order Items</span>
                        </a>
                    </li>
                    @endif

                    <!-- Admin Only Links -->
                    @if (auth()->user()->role === App\Models\Role::ADMIN)
                    <li>
                        <a href="{{ route('dashboard.users.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-100 hover:text-black">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 7a4 4 0 1 0-6 0 4 4 0 0 0 6 0ZM4 21v-2a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v2" />
                            </svg>
                            <span class="ms-3">Users</span>
                        </a>
                    </li>
<<<<<<< HEAD


                    {{-- <li>
                        <a href="{{ route('dashboard.orders.index') }}" class="flex items-center p-2 text-white rounded-lg dark:text-gray-900 hover:bg-gray-100 hover:text-black group">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-500 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-3 5h3m-6 0h.01M12 16h3m-6 0h.01M10 3v4h4V3h-4Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Order</span>
                        </a>
                    </li> --}}



                    <li>
                        <a href="{{ route('dashboard.order-items.index') }}" class="flex items-center p-2 rounded-lg text-white-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black dark:group-hover:text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l3.6-7H6.4M16 16a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm-4 0H7.6M7.6 16a2 2 0 1 1-4 0 2 2 0 0 1 4 0z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap group-hover:text-black dark:group-hover:text-black">Order Items</span>
                        </a>
                    </li>

=======
>>>>>>> c63a4d71ec35c4542514ecb6b9eae7ef56922b08
                    @endif

                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="flex items-center p-2 space-x-1 rounded-lg text-white-900 dark:text-white hover:bg-gray-100 hover:text-black dark:hover:bg-gray-700 group">
                            @csrf
                            <button type="submit" class="flex items-center w-full text-white transition duration-75 dark:text-gray-400 group-hover:text-black">
                                <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"></path>
                                </svg>
                                <span class="whitespace-nowrap">Sign out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <div class="p-4 rounded-lg bg-gray-50">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
