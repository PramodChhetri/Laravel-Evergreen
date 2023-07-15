<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- JQuery Table Script -->
        <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src="{{asset('datatable/datatables.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        @livewireStyles
        <style>
            .sidebar {
                width: 260px;
            }
    
            .sidebar.hidden {
                transform: translateX(-260px);
            }
    
            .content {
                transition: margin-left 0.3s;
            }
          </style>
          
    </head>
    
    <body class="bg-gray-300">
        <div class="flex">
            <!-- Sidebar -->
            <div class="sidebar w-60 min-h-screen bg-gray-800 shadow-lg flex flex-row justify-center py-24 ">
                <!-- Sidebar Content Here -->
                <div class="flex flex-col">
                    <a href="/dashboard" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white ">Dashboard</a>
                    <a href="{{route('allusers.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Users</a>
                    <a href="{{route('approval.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Approval Requests</a>
                    <a href="{{route('category.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Categories</a>
                    <a href="{{route('stock.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Stock</a>
                    <a href="{{route('products.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Products</a>
                    <a href="{{route('orders.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Orders</a>
                    <a href="{{route('roles.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Roles</a>
                    <a href="{{route('permissions.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Permissions</a>
                    <a href="{{route('feedbacks.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Feedbacks</a>
                    <a href="{{route('messages.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Messages</a>
                    <a href="{{route('profile.edit')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Profile</a>
                    </div>
            </div>
    
            <!-- Main Content -->
            <div class="content flex-grow bg-gray-300">
                <!-- Navbar -->
                <nav class="bg-white min-h-18 text-gray-800 px-2 py-2">
                    <div class="flex items-center justify-between">
                        <div>
                            <!-- Sidebar Toggle Button -->
                            <button id="sidebarToggle" class="text-gray-800 hover:bg-gray-400 focus:outline-none">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h8m-8 6h16"></path>
                                </svg>
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('dashboard') }}">
                                <span class="font-bold text-2xl text-green-700 hover:bg-gray-400">EVERGREEN NEPAL</span>
                            </a>
                        </div>
                        <div class="flex items-center">
                            <!-- User Image -->
                            <img class="w-8 h-8 rounded-full" src="{{asset('images/users/'.Auth::user()->image)}}" alt="User Image">

                        <div>
                            <div class="relative">
                                <!-- Dropdown Toggle Button -->
                                <button id="dropdownToggle"
                                    class="pr-4 py-2  text-gray-800 hover:bg-gray-400 focus:outline-none">
                                    <!-- User Name -->
                                    <span class="font-medium">{{ Auth::user()->name }}</span>
                                    <svg class="h-4 w-4 inline-block ml-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                                <!-- Dropdown Menu -->
                                <ul id="dropdownMenu"
                                    class="absolute right-0 hidden mt-2 py-2 w-32 bg-white rounded-md shadow-lg z-10">
                                    <li>
                                        <a href="{{route('profile.edit')}}"
                                            class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a>
                                    </li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf            
                                    <li>
                                        <a href="{{route('logout')}}"class="block px-4 py-2 text-gray-800 hover:bg-gray-200" onclick="event.preventDefault();
                                        this.closest('form').submit();">Logout</a>
                                    </li>
                                </form>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
    
                <!-- Main Content Here -->
                <div class="flex-1 p-4">
                    @yield('content')
                </div>
            </div>
        </div>
    
        <script>
            // JavaScript to toggle sidebar visibility
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
    
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('hidden');
                content.classList.toggle('ml-0');
            });
        </script>
    
    <script>
        const dropdownToggle = document.getElementById('dropdownToggle');
        const dropdownMenu = document.getElementById('dropdownMenu');
    
        dropdownToggle.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
    

    </body>
    

    @livewireScripts
    </html>
