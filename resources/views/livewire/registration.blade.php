<div>
    <h2>Registration</h2>
   <form wire:submit.prevent="submit">

    <input type="text" placeholder="name" wire:model="name">
    <br>
    @error('name')
        <span>{{$message}}</span>
    @enderror
    <br>
    <input type="number" placeholder="rollno" wire:model="rollno">
    <br>
    @error('rollno')
        <span>{{$message}}</span>
    @enderror
    <br>
    <input type="email" placeholder="email" wire:model="email">
    <br>
    @error('email')
        <span>{{$message}}</span>
    @enderror
    <br>
    <button type="submit">Save</button>
    

   </form>
</div>
