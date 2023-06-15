@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-4xl text-black-700">Edit Category</h2> 

    <div class="rounded-lg border-4 border-green-500 my-2 py-2 px-2">
    <form action="{{route('category.update',$category->id)}}" method="POST" class="mt-5"  enctype="multipart/form-data">
        @csrf
        <input type="text" placeholder="Category Name" name="name" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{$category->name}}">
        @error('name')
            <p class="text-red-300 text-xs -mt-2">{{$message}}</p>
        @enderror
        <input type="text" placeholder="Priority" name="priority" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{$category->priority}}">
        @error('priority')
            <p class="text-red-300 text-xs -mt-2">{{$message}}</p>
        @enderror

        <img class="w-44 border-2 border-red-300 my-1 p-1" src="{{ asset('images/categories/'.$category->photopath) }}" alt="">

        <input type="file" name="photopath" class="w-full rounded-lg border-2 border-red-300 my-2">
        @error('photopath')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 my-4 rounded-lg" value="Update Category">

            <a href="{{route('category.index')}}" class="bg-red-600 text-white px-4 py-2 my-4 mx-2 rounded-lg">Exit</a>
        </div>
    </form>
    </div>

@endsection