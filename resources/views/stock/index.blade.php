@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Stock</h2> 
<hr class="h-1 bg-red-500">


@include('layouts.message')
<br>
    <table id="mytable" class="display">
        <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Action</th>
        </thead>
        <tbody>
            @error('stock')
            <p class="text-red-400 text-xl -mt-2">{{$message}}</p>
            <br>
            @enderror

            @foreach($allproducts as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img class="w-44" src="{{ asset('images/products/'.$product->photopath) }}" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->stock}}</td>
                <td>
                    <form action="{{route('stock.update',$product->id)}}" method="POST">
                    @csrf
                    <input type="number" placeholder="Stock" name="stock" class="w-20 rounded-lg border-2 border-red-300 my-2" value="{{$product->stock}}">
                    <button href="{{route('products.edit',$product->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <script>
        let table = new DataTable('#mytable');
    </script>

@endsection
    
