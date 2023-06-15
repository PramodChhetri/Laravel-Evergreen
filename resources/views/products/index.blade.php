@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Products</h2> 
<hr class="h-1 bg-red-500">


@include('layouts.message')

    <div class="my-4 text-right px-10">
        <a href="{{route('products.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Products</a>
    </div>

    <table id="mytable" class="display">
        <thead>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Condition</th>
            <th>Created At</th>
            <th>Action</th>
        </thead>
        <tbody>

            @foreach($allproducts as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img class="w-44" src="{{ asset('images/products/'.$product->photopath) }}" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->condition}}</td>
                <td>@if ($product->created_at == NULL)
                    <p>No Data</p>              
                @else
                {{ Carbon\Carbon::parse($product->created_at)->diffForHumans()}}
                    
                @endif</td>
                <td>
                    <a href="{{route('products.edit',$product->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Edit</a>
                    {{-- <a onclick="return confirm('Are you sure to delete?')" href="{{route('category.destroy',$category->id)}}" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400">Delete</a> --}}

                    <a onclick="showDelete('{{$product->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('products.destroy')}}" method="POST">
                    @csrf
                    <p class="text-2xl">Are you sure want to Delete?</p>
                    <input type="hidden" name="dataid" id="dataid" value="">
                    <div class="flex justify-center">
                        <input type="submit" value="Yes" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">
                        <a onclick="hideDelete()" class="bg-red-600 text-white px-4 py-2 mx-2 rounded-lg cursor-pointer">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let table = new DataTable('#mytable');
    </script>

    <script>

        function showDelete(x)
        {
            // $('#dataid').val(x);
            document.getElementById('dataid').value = x;
            document.getElementById('deleteModal').style.display = "block";
        }

        function hideDelete()
        {
            document.getElementById('deleteModal').style.display = "none";
        }
    </script>


@endsection
    
