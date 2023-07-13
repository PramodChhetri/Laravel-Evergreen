@extends('layouts.app')

@section('content')

@include('layouts.message')

<h2 class="font-bold text-4xl text-black-700">Feedbacks</h2> 
<hr class="h-1 bg-red-500">
<br>
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Product Name</th>
                <th>Feedback</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($feedbacks as $FB)
            <tr>
              <td>{{$FB->user->name }}</td>
              <td>{{$FB->product->name}}</td>
              <td>{!! html_entity_decode($FB->feedback) !!}</td>
                <td>
                    <a onclick="showDelete('{{$FB->id}}')" class="bg-red-600 text-white px-2 py-1 rounded shadow hover:shadow-red-400 cursor-pointer">Delete</a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    {{-- backdrop-filter: blur(15px); --}}
    <div id="deleteModal" class="fixed hidden left-0 top-0 right-0 bottom-0 bg-opacity-50 backdrop-blur-sm bg-blue-400">
        <div class="flex h-full justify-center items-center">
            <div class="bg-white p-4 rounded-lg">
                <form action="{{route('feedbacks.destroy')}}" method="POST">
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