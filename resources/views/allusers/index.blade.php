@extends('layouts.app')

@section('content')

<h2 class="font-bold text-4xl text-black-700">Users</h2> 
<hr class="h-1 bg-red-500">

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
            @foreach($users as $usr)
            <tr>
                <td>{{$usr->id}}</td>
                <td>{{$usr->name}}</td>
                <td>{{$usr->role_id}}</td>
                <td>{{$usr->email}}</td>
                <td>{{$usr->created_at->diffForHumans()}}</td>
                <td>{{$usr->updated_at->diffForHumans()}}</td>
                <td>
                    <a href=""><button class="button">Edit</button></a>
                    <a href=""><button>Delete</button></a>
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