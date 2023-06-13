@extends('layouts.app')

@section('content')
    <h2 class="font-bold text-4xl text-black-700">Edit User</h2> 
    <div class="rounded-lg border-4 border-green-500 my-2 py-2 px-2">
        <form action="{{route('allusers.update',$user->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
            @csrf
            <select name="role_id" id="" class="w-full rounded-lg border-2 border-red-300 my-2">
                <option value="" disabled selected hidden>Select Role</option>
                <option value="1" @if ($user->role->id == 1) selected @endif>Admin</option>
                <option value="2" @if ($user->role->id == 2) selected @endif>Seller</option>
                <option value="3" @if ($user->role->id == 3) selected @endif>Buyer</option>
            </select>
            @error('role_id')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <img class="w-44 border-2 border-red-300 my-1 p-1" src="{{ asset('images/users/'.$user->image) }}" alt="">
            <div class="rounded-lg border-2 border-red-300">
                <label for="image" class="w-full my-2">Select Profile Photo</label>
                <input type="file" name="image" class="w-full border-2 border-gray-400 my-2">
            </div>
            @error('image')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Name" name="name" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{ $user->name }}">
            @error('name')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <input type="email" placeholder="Email" name="email" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{ $user->email }}">
            @error('email')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <select name="status" id="" class="w-full rounded-lg border-2 border-red-300 my-2">
                <option value="" disabled selected hidden>Select Status</option>
                <option value="1" @if ($user->status == "1") selected @endif>Active</option>
                <option value="0" @if ($user->status == "0") selected @endif>Not Active</option>
            </select>
            @error('status')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Contact Number" name="phone" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{ $user->phone }}">
            @error('phone')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Address" name="address" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{ $user->address }}">
            @error('address')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <img class="w-44 h-44 border-2 border-red-300 my-1 p-1" src="{{ asset('images/pan/'.$user->panimage) }}" alt="">
            <div class="rounded-lg border-2 border-red-300">
                <label for="panimage" class="w-full my-2">Select Pan Image</label>
                <input type="file" name="panimage" class="w-full border-2 border-gray-400 my-2">
            </div>            
            @error('panimage')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <input type="text" placeholder="Pan Number" name="pannumber" class="w-full rounded-lg border-2 border-red-300 my-2" value="{{ $user->pannumber }}">
            @error('pannumber')
                <p class="text-red-400 text-xs -mt-2">{{ $message }}</p>
            @enderror

            <div class="flex">
                <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Update User">
                <a href="{{ route('allusers.index') }}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>
            </div>
        </form>
    </div>
@endsection
