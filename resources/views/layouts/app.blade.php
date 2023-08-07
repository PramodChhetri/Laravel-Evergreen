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

        .notification-container {
            position: relative;
            display: inline-block;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .notification-badge {
            position: absolute;
            top: -6px;
            right: -6px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 4px;
            font-size: 10px;
            transition: transform 0.3s ease-in-out;
        }

        /* Style the notification sidebar */
        .notification-sidebar {
            position: fixed;
            top: 0;
            right: -320px; /* Initially hidden on the right */
            width: 400px; /* Increased width to 320px */
            z-index: 100;
            padding: 20px;
            border: 2px solid #e2e8f0; /* Add a beautiful border */
            border-radius: 4px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
            transition: right 0.3s ease-in-out;
        }

        .notification-sidebar h1 {
            color: #1f2937;
            border-bottom: 2px solid #1f2937;
        }

        .notification-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .notification-sidebar li {
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px; /* Rounded corners */
            border: 1px solid #ccc;
        }

        .notification-sidebar li:hover {
            margin-top: 10px;
            padding: 10px;
            background-color: #e1e1e1;
            border: 1px solid #a1a1a1;
        }
        .notification-sidebar li:last-child {
            /* border-bottom: none; */
        }

        /* Animate the notification sidebar slide-in effect */
        .notification-sidebar:not(.hidden) {
            right: 0;
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
                    <a href="{{route('adminnotifications.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Notifications</a>
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
                            
                            <div class="notification-container mr-8">
                                <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                  </svg>   
                                </div>
                                <div class="notification-badge"><b>44</b></div> <!-- Replace 42 with the actual number you want to display -->
                              </div>
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

            <!-- Notification Sidebar -->
        <div id="notificationSidebar" class="notification-sidebar min-h-screen bg-white shadow-lg flex flex-col  py-24 hidden">
            <!-- Add content for the notification sidebar here -->
            <!-- For example, you can show the list of notifications -->
            <h1 class="text-center text-grey-600 text-xl font-bold">Notifications</h1>
            <div class="relative">
                <!-- Your content goes here -->
                <span class="float-right"><u>See all</u></span>
              </div>
            <ul class="mt-4">
                <li class="px-4 py-2">
                    <div>
                        <span>11:59 PM</span>
                        <p> Notification 1</p>
                    </div>
                </li>
                <li class="px-4 py-2">
                    <div>
                        <span>11:59 PM</span>
                        <p> Notification 1</p>
                    </div>
                </li>
                <li class="px-4 py-2">
                    <div>
                        <span>11:59 PM</span>
                        <p> Notification 1</p>
                    </div>
                </li>
                <li class="px-4 py-2">
                    <div>
                        <span>11:59 PM</span>
                        <p> Notification 1</p>
                    </div>
                </li>
                <li class="px-4 py-2">
                    <div>
                        <span>11:59 PM</span>
                        <p> Notification 1</p>
                    </div>
                </li>
            </ul>
            
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
    
            // JavaScript to toggle notification sidebar visibility
            const notificationToggle = document.querySelector('.notification-container');
            const notificationSidebar = document.getElementById('notificationSidebar');
    
            notificationToggle.addEventListener('click', () => {
                notificationSidebar.classList.toggle('hidden');
            });
    
            // Close notification sidebar when clicked outside of it
            window.addEventListener('click', (event) => {
                if (!notificationToggle.contains(event.target) && !notificationSidebar.contains(event.target)) {
                    notificationSidebar.classList.add('hidden');
                }
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
