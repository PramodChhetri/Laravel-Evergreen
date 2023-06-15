@extends('layouts.app')

@section('content')

@include('layouts.message')

<h2 class="font-bold text-4xl text-black-700">Approval Requests</h2> 
<hr class="h-1 bg-red-500">

<div class="py-2">
    <table id="mytable" class="display">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Pan Image</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Pan Number</th>
            <th>Requested</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{$request->user_id}}</td>
                <td>{{$request->user->name}}</td>
                <td><img class="w-44" src="{{ asset('images/pan/'.$request->user->panimage) }}"></td>
                <td>{{$request->user->address}}</td>
                <td>{{$request->user->phone}}</td>
                <td>{{$request->user->pannumber}}</td>
                <td>{{$request->created_at->diffForHumans()}}</td>
                <td>
                    <a href="{{route('approval.update',$request->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Approve</a>
                    <a onclick="showDelete('{{$request->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Reject</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

 {{-- backdrop-filter: blur(15px); --}}
 <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
    <div class="flex h-full justify-center items-center">
        <div class="bg-white p-4 rounded-lg">
            <form action="{{route('approval.destroy')}}" method="POST">
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

