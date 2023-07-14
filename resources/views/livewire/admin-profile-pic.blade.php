<form method="post" action="{{route('profile.updatePP',Auth::user()->id)}}" class="mt-6 space-y-6" enctype="multipart/form-data">
    @csrf               
    <div>
        <x-input-label for="image" :value="__('Change Image')" />

        @if ($photo)
        <img class="w-64 h-64 mt-4 rounded-full border-2 bg-gray-900" src="{{ $photo->temporaryUrl() }}" alt="User Image"> 
        @else
        <img class="w-64 h-64 mt-4 rounded-full border-2 bg-gray-900" src="{{asset('images/users/'.Auth::user()->image)}}" alt="User Image">        
        @endif
        <input type="file" name="image" id="image" class="mt-6 block w-full" style="color: white; background-color: black;" wire:model="photo">
    </div>

    <button type="submit" class="bg-gray-800 mt-4 text-white hover:bg-gray-700 px-4 py-1 rounded-md">Save</button>
</form>