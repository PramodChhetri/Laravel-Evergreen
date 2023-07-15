@extends('layouts.app')

@section('content')
    <h2 class="font-bold text-4xl text-black-700">Dashboard</h2> 
    <hr class="h-1 bg-red-500">

    <div class="mt-4 grid grid-cols-4 gap-10">
        <a href="{{route('allusers.index')}}">
            <div class="px-4 py-8 rounded-lg bg-blue-600 text-white flex justify-between">
                <p class="font-bold text-lg">Evergreen Community</p>
                <p class="font-bold text-5xl">{{ count($users) }}</p>
            </div>
        </a>

        <a href="{{route('category.index')}}"> 
            <div class="px-4 py-8 rounded-lg bg-red-600 text-white flex justify-between">
                <p class="font-bold text-lg">Total Categories</p>
                <p class="font-bold text-5xl">{{ count($categories) }}</p>
            </div>
        </a>

        <a href="{{route('products.index')}}">
            <div class="px-4 py-8 rounded-lg bg-green-600 text-white flex justify-between">
                <p class="font-bold text-lg">Total Products</p>
                <p class="font-bold text-5xl">{{ count($products) }}</p>
            </div>
        </a>

        <a href="{{route('orders.index')}}">
            <div class="px-4 py-8 rounded-lg bg-pink-600 text-white flex justify-between">
                <p class="font-bold text-lg">Total Orders</p>
                <p class="font-bold text-5xl">{{ count($users) }}</p>
            </div>
        </a>
    </div>

    {{-- <hr class="h-1 bg-red-300 mt-10"> --}}

    <div class="m-10">
        <canvas id="myChart"></canvas>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script type="text/javascript">
        var _ydata = {!! json_encode($months) !!};
        var _xdata = {!! json_encode($monthCount) !!};
    
        const ctx = document.getElementById('myChart');
    
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: _ydata,
                datasets: [{
                    label: 'Total Orders',
                    data: _xdata,
                    borderWidth: 1,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                        ],
                    borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)'
                        ],
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
