@extends('layouts.app')

@section('content')

@include('layouts.message')

<h2 class="font-bold text-4xl text-black-700">Roles</h2> 
<hr class="h-1 bg-red-500">

    <div class="my-4 text-right px-10">
        <a href="{{route('roles.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Role</a>
    </div>

    <table id="mytable" class="display">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Permissions</th>
            <th>Updated At</th>
            <th>Action</th>
        </thead>
        <tbody>

            @foreach($allroles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td> @forelse ($role->permissions as $rp)
                    <span class="text-blue-900 px-1 py-1 rounded" ><b><u>{{$rp->name}}</u></b></span>
                    @empty
                    <span class="bg-red-400 text-white px-2 py-1 rounded">No Permissions</span>
                    @endforelse</td>
                <td>{{$role->updated_at->diffForHumans()}}</td>
                <td>
                    @if (!(Auth::user()->hasRole($role->name)))
                    <a href="{{route('roles.edit',$role->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Edit</a>
                    @endif
                    <a href="{{route('roles.assignpermission',$role->id)}}" class="bg-green-600 text-white px-2 py-1 rounded shadow hover:shadow-green-400">Assign Permission</a>
                    @if (!(Auth::user()->hasRole($role->name)))
                    <a onclick="showDelete('{{$role->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer">Delete</a> 
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{ route('roles.destroy') }}" method="POST">
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
        $('#mytable').dataTable( {
  "columnDefs": [
    { "width": "50%", "targets": 2 }
  ]
} );
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