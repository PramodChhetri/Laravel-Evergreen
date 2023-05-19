@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Users</h2> 
<hr class="h-1 bg-red-500">

@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Add User</h2> 
<hr class="h-1 bg-red-500">

<div class="rounded-lg border-4 border-white my-2 py-1 px-1">
    <form action="" method="POST" class="mt-5">
        @csrf
        <input type="text" placeholder="User Name" name="name" class="w-full rounded-lg border-gray-300 my-2" value="{{old('name')}}">
        @error('name')
            <p class="text-red-500 text-xm -mt-3">{{$message}}</p>
        @enderror
        <input type="text" placeholder="Email" name="email" class="w-full rounded-lg border-gray-300 my-2" value="{{old('email')}}">
        @error('email')
            <p class="text-red-500 text-xm -mt-3">{{$message}}</p>
        @enderror
        <select placeholder="Role" name="category" class="my-2 w-full focus:border-green-500 rounded-lg border-gray-300">
            <option value="" disabled selected hidden >Role</option>
            @foreach ($roles as $role)
                <option value="{{$role['id']}}">{{$role['name']}}</option>
            @endforeach
        </select>
        @error('category')
            <p class="text-red-500 text-xm -mt-3">{{$message}}</p>
        @enderror

        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Add Category">
    
            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
        </div>
    </form>
</div>

@endsection


@endsection