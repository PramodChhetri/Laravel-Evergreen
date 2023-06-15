@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Add Category</h2> 

<div class="rounded-lg border-4 border-green-500 my-2 py-2 px-2">
    <form action="{{route('category.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Category Name" name="name" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('name')}}">
        @error('name')
            <p class="text-red-400 text-xm -mt-3">{{$message}}</p>
        @enderror
        <input type="text" placeholder="Priority" name="priority" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('priority')}}">
        @error('priority')
            <p class="text-red-400 text-xm -mt-3">{{$message}}</p>
        @enderror

        <input type="file" name="photopath" class="w-full rounded-lg border-2 border-red-300 my-2">
        @error('photopath')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror
    
        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 my-4 rounded-lg" value="Add Category">
    
            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-10 py-2  my-4 mx-2 rounded-lg">Exit</a>
        </div>
    </form>
</div>

@endsection
