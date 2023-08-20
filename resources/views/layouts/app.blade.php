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

          {{-- Toast Cdn  --}}
            <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        <!-- Pusher App Name - evergreennepal -->
        <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
        <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('e8d7a1b0813126efbdb5', {
          cluster: 'ap2'
        });

            // Function to play a notification sound
    function playNotificationSound() {
      var audio = new Audio('{{asset('sound/notification1.mp3')}}'); // Replace with the actual path to your audio file
      audio.play();
    }


        var channel = pusher.subscribe('adminnotification-channel');
        channel.bind('userregister-event', function(data) {
          // Play notification sound
      playNotificationSound();
      
      toastr.options = {
        "closeButton": true,
        "progressBar": true
      };
      toastr.success(JSON.stringify(data.notification.content), 'New User!', { timeOut: 10000 });
        });

        channel.bind('sellrequest-event', function(data) {
          // Play notification sound
      playNotificationSound();
      
      toastr.options = {
        "closeButton": true,
        "progressBar": true
      };
      toastr.success(JSON.stringify(data.notification.content), 'Sell Request!', { timeOut: 10000 });
        });
       
        </script>
        <!-- Pusher Close  -->

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
            padding-inline: 20px;
            padding-top: 5px;
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
                          
            <livewire:admin-notification />


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
            const notificationSidebarClose = document.getElementById('notificationSidebarClose');

            notificationSidebarClose.addEventListener('click', () => {
                notificationSidebar.classList.toggle('hidden');
            });
    
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
