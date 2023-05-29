@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-black-700">Add Product</h2> 
<div class="rounded-lg border-4 border-green-500 my-2 py-2 px-2">
    <form action="{{route('products.update',$product->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <select name="category_id" id="" class="w-full rounded-lg border-2 border-red-300 my-2">
            <option value="" disabled selected hidden >Select Category</option>
            @foreach($allcategories as $category)
            <option 
            @if ($product->category_id == $category->id)
                {{"selected"}}
            @endif
            value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @error('category_id')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="text" placeholder="Product Name" name="name" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{$product->name}}">
        @error('name')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="number" placeholder="Price" name="price" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{$product->price}}">
        @error('price')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror


        <input type="number" placeholder="Stock" name="stock" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{$product->stock}}">
        @error('stock')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <select name="condition" id="" class="w-full rounded-lg border-2 border-red-300 my-2">
            <option value="" disabled selected hidden  >Select Condition</option>
            <option value="New" @if ($product->condition == "New")
                {{"selected"}}
            @endif>New</option>
            <option value="FairlyNew" @if ($product->condition == "FairlyNew")
                {{"selected"}}
            @endif >FairlyNew</option>
            <option value="Old" @if ($product->condition == "Old")
                {{"selected"}}
            @endif >Old</option>
        </select>
        @error('condition')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="text" placeholder="Brand" name="brand" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{$product->brand}}">
        @error('brand')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <textarea placeholder="Desription" rows="8" name="description" class="w-full rounded-lg border-2 border-red-300 my-2" value="">{{$product->description}}</textarea>
        @error('description')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror
        
        <img class="w-44 border-2 border-red-300 my-1 p-1" src="{{ asset('images/products/'.$product->photopath) }}" alt="">

        <input type="file" name="photopath" class="w-full rounded-lg border-2 border-red-300 my-2">
        @error('photopath')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Update Product">

            <a href="{{route('products.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
        </div>
    </form>
</div>

@endsection