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
            <a href="{{ route('dashboard.index') }}" class="text-2xl font-semibold">
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

                    <li>
                        <a href="{{ route('dashboard.index') }}" class="flex items-center p-2 rounded-lg text-white-900 dark:text-white hover:bg-gray-100 hover:text-black group">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('dashboard.categories.index') }}" class="flex items-center p-2 rounded-lg text-white-900 dark:text-white hover:bg-gray-100 hover:text-black group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('dashboard.products.index') }}" class="flex items-center p-2 rounded-lg text-white-900 dark:text-white hover:bg-gray-100 hover:text-black group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                <path d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Products</span>
                        </a>
                    </li>



                    @if (auth()->user()->role === App\Models\Role::ADMIN)
                    <li class="mt-4 text-white-400">ADMIN</li>
                    <li>
                        <a href="{{ route('dashboard.users.index') }}" class="flex items-center p-2 rounded-lg text-white-900 dark:text-white hover:bg-gray-100 hover:text-black group">
                            <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                            </svg>
                            <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                        </a>
                    </li>


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
        <main class="flex-1 p-6">
            <div class="flex-wrap justify-between pt-3 pb-2 mb-3 d-flex flex-md-nowrap align-items-center border-bottom">
                <h1 class="text-2xl font-semibold">
                    @yield('title-header')
                </h1>
            </div>

            <div class="mt-4 col-lg-8">
                @yield('content')
            </div>


        </main>
    </div>

</body>

</html>




