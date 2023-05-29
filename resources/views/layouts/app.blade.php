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

    </head>
    <body class="font-sans antialiased">
        <div class="flex">
            <div class="w-60 min-h-screen bg-gray-800 shadow-lg flex flex-row justify-center py-24 ">
                    <div class="flex flex-col">
                    <a href="/dashboard" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white ">Dashboard</a>
                    <a href="{{route('allusers.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Users</a>
                    <a href="{{route('category.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Categories</a>
                    <a href="{{route('products.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Products</a>
                    <a href="{{route('roles.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Roles</a>
                    <a href="{{route('permissions.index')}}" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Permissions</a>
                    <a href="/profile" class="text-xl text-white m-3 border-b-2 hover:bg-green-700 hover:text-white">Profile</a>
                    </div>
            </div>
            <div class="flex-1 bg-gray-200">
                <div>
                    @include('layouts.navigation')
                </div>
                <div class="p-5">
                    @yield('content')
                </div>
            </div>            
           </div>
        </div>
    </body>
</html>
