@extends('layouts.app')

@section('content')
    <h2 class="font-bold text-4xl text-black-700">Dashboard</h2> 
    <hr class="h-1 bg-red-500">

    <div class="py-2">
        <h2 class="font-bold text-2xl text-green-700">Hello, {{Auth::user()->name }}. Welcome to Admin Dashboard.</h2> 
    </div>
    
    <div class="mt-4 grid grid-cols-3 gap-10">

        <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex justify-between">
            <p class="font-bold text-lg">Evergreen Community</p>
            <p class="font-bold text-5xl">{{count($users)}}</p>
        </div>


        <div class="px-4 py-8 rounded-lg bg-red-600 text-white flex justify-between">
            <p class="font-bold text-lg">Total Categories</p>
            <p class="font-bold text-5xl">8</p>
        </div>


        <div class="px-4 py-8 rounded-lg bg-green-600 text-white flex justify-between">
            <p class="font-bold text-lg">Pending Orders</p>
            <p class="font-bold text-5xl">19</p>
        </div>

    </div>

    <div class="my-4"><img src="/images/users/{{Auth::user()->image}}" alt=""></div>


@endsection

