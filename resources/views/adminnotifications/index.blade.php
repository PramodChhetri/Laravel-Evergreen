@extends('layouts.app')

@section('content')

@include('layouts.message')

<style>
    
.notification-containers{
    border-bottom: 2px solid #a1a1a1;
    border-inline: 2px solid #a1a1a1;
    border-top: 2px solid #a1a1a1;
    margin-bottom: 10px;
    border-radius: 5px;
    padding-bottom: 4px;
    padding-inline: 4px;
}
.notification-containers:hover {
    background-color: #e1e1e1;
    border: 2px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    text-decoration: none;
}

.label-new {
  background-color: crimson;
  color: white;
  font-size: 0.8rem;
  padding: 2px 6px;
  border-radius: 4px;
  margin-left: 10px;
}

</style>

<div class="flex justify-between items-center">
<h2 class="font-bold text-4xl text-black-700">Notifications</h2> 
<a href="{{ route('user.notifications.markallasread') }}" class="text-blue-600 underline">Mark as Read</a>
</div>
<hr class="h-1 bg-red-500">
<br>

<div >
    @foreach ($notifications as $ntf)
    <a href="{{ route('user.notification.redireact', $ntf->id) }}">
        <div class="notification-containers">
            <span style="color:#37517e;"><b>{{ $ntf->created_at->format('h:i A, d-F-Y') }}</b></span>
            @if ($ntf->status != 'Read')
            <span class="bg-red-500 text-white px-1 rounded">New</span>
            @endif
            <p class="card-text">{{ $ntf->content }}</p>
        </div>
    </a>
    @endforeach
    <div class="mt-6">
        {{ $notifications->links() }} <!-- Display pagination links -->
    </div>
</div>

    

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="" method="POST">
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