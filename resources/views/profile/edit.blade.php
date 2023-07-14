@extends('layouts.app')

@section('content')

    <h2 class="font-bold text-4xl text-black-700">Profile</h2> 
    <hr class="h-1 bg-red-500">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Profile Picture') }}
                        </h2>
                
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile picture") }}
                        </p>
                    </header>
                    <livewire:admin-profile-pic/>
                    {{-- <form method="post" action="" class="mt-6 space-y-6">
                        @csrf               
                        <div>
                            <x-input-label for="image" :value="__('Change Image')" />
                                <img class="w-64 h-64 mt-4 rounded-full border-2 bg-gray-900" src="{{asset('images/users/'.Auth::user()->image)}}" alt="User Image">
                            <input type="file" name="image" id="image" class="mt-4 block w-full" style="color: white; background-color: black;">

                            <button type="submit" class="bg-gray-800 mt-4 text-white hover:bg-gray-700 px-4 py-1 rounded-md">Save</button>

                        </div>
                    </form> --}}
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

@endsection
