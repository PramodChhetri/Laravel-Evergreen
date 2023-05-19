@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Users</h2> 
<hr class="h-1 bg-red-500">

<div class="my-4 text-right px-10">
    <a href="{{route('allusers.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add New User</a>
</div>

<div class="py-2">
    <table id="mytable" class="display">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Created_At</th>
            <th>Updated_At</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach($allusers as $usr)
            <tr>
                <td>{{$usr->id}}</td>
                <td>{{$usr->name}}</td>
                <td>{{$usr->role_id}}</td>
                <td>{{$usr->email}}</td>
                <td>{{$usr->created_at->diffForHumans()}}</td>
                <td>{{$usr->updated_at->diffForHumans()}}</td>
                <td>
                    <a href="" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Edit</a>
                    <a href="" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let table = new DataTable('#mytable');
</script>
    
@endsection