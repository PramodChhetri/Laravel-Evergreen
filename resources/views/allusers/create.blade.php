@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-black-700">Add User</h2> 
<div class="rounded-lg border-4 border-green-500 my-2 py-2 px-2">
    <form action="{{route('allusers.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
        @csrf
        <select name="role_id" id="" class="w-full rounded-lg border-2 border-red-300 my-2">
            <option value="" disabled selected hidden >Select Role</option>
            @foreach($roles as $role)
            <option 
            @if (old('role_id') == $role->id)
                {{"selected"}}
            @endif
            value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @error('role_id')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <div class=" rounded-lg border-2 border-red-300">
        <label for="image" class="w-full my-2"> Select Profile Photo</label>
        <input type="file" name="image" class="w-full border-2 border-gray-400 my-2">
        </div>
        @error('image')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="text" placeholder="Name" name="name" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('name')}}">
        @error('name')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="email" placeholder="Email" name="email" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('email')}}">
        @error('email')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="password" placeholder="Password" name="password" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('password')}}">
        @error('password')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="password" placeholder="Confirm Password" name="password_confirmation" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('password_confirmation')}}">
        @error('password_confirmation')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <select name="status" id="" class="w-full rounded-lg border-2 border-red-300 my-2">
            <option value="" disabled selected hidden >Select Status</option>
            <option 
            @if (old('status') == "1")
                {{"selected"}}
            @endif
            value="1">Active</option>
            <option 
            @if (old('status') == "0")
                {{"selected"}}
            @endif
            value="0">Not Active</option>
        </select>
        @error('status')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="text" placeholder="Contact Number" name="phone" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('phone')}}">
        @error('phone')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <input type="text" placeholder="Address" name="address" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('address')}}">
        @error('address')
            <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
        @enderror

        <div class=" rounded-lg border-2 border-red-300">
            <label for="panimage" class="w-full my-2"> PAN Photo ( Optional ) </label>
            <input type="file" name="panimage" class="w-full border-2 border-gray-400 my-2">
            </div>
            @error('panimage')
                <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
            @enderror
    
            <input type="text" placeholder="PAN Number ( Optional )" name="pannumber" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{old('pannumber')}}">
            @error('pannumber')
                <p class="text-red-400 text-xs -mt-2">{{$message}}</p>
            @enderror

        <div class="flex">
            <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Add User">

            <a href="{{route('allusers.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
        </div>
    </form>
</div>

@endsection