@extends('layouts.app')

@section('content')

@include('layouts.message')

<h2 class="font-bold text-4xl text-black-700">Order History</h2> 
<hr class="h-1 bg-red-500">
<br>
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>Seller</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Payment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($orders as $OD)
            <tr>
              <td>{{$OD->seller->name }}</td>
              <td>{{$OD->product->name}}</td>
              <td>{{$OD->quantity}}</td>
              <td>{{$OD->total_price}}</td>
              <td>
                @if ($OD->status == "Returned")
                <p class="bg-red-600 p-1" >{{$OD->status}}</p> 
                @elseif($OD->status == "Completed")
                <p class="bg-green-600 p-1" >{{$OD->status}}</p> 
                @elseif($OD->status == "Approved")
                <p class="bg-blue-400 p-1" >{{$OD->status}}</p> 
                @elseif($OD->status == "Pending")
                <p class="bg-gray-400 p-1" >{{$OD->status}}</p> 
                @endif
              </td>
              <td>{{$OD->payment_method}}</td>
                <td>
                    <a onclick="showDelete('{{$OD->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('orders.destroy')}}" method="POST">
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