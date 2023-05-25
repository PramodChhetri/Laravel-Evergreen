@extends('layouts.app')
@section('content')
    <h2 class="font-bold text-4xl text-black-700">Assign Permissions</h2> 

    <div class="rounded-lg border-4 border-green-500 my-2 py-2 px-2">
    <form action="{{ route('roles.updatepermission',$role->id)}}" method="POST" class="mt-5">

        @forelse ($role->permissions as $rp)
        <span class="bg-green-600 text-white px-2 py-1 rounded">{{$rp->name}}</span>
        @empty
        <span class="bg-red-400 text-white px-2 py-1 rounded">No Permissions</span>
        @endforelse

        @csrf
        <select name="permissions[]" id="" class="w-full rounded-lg border-2 border-red-300 my-2" multiple>
            @foreach ($permissions as $permission)
            <option class="py-1" value="{{ $permission->id }}" @selected($role->hasPermission($permission->name)) >{{ $permission->name }}</option>
            @endforeach
        </select>
        @error('name')
            <p class="text-red-300 text-xs -mt-2">{{$message}}</p>
        @enderror

        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 my-4 rounded-lg" value="Assign">

            <a href="{{route('roles.index')}}" class="bg-red-600 text-white px-4 py-2 my-4 mx-2 rounded-lg">Exit</a>
        </div>
    </form>
    </div>

@endsection