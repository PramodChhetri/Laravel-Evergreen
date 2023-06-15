@extends('layouts.master_innerpage')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Seller Center</h2>
      <ol>
        <li><a href="{{ route('user.sell.index') }}">Home</a></li>
        <li>Seller Center</li>
      </ol>
    </div>
  </div>
</section>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 sidebar">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.sell.index') }}">Seller Center</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('user.sell.managestocks') }}">Manage Stocks</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.sell.manageproducts') }}">Manage Products</a>
            </li>
            </ul>
    </div>
    <div class="col-md-10 content">
      <!-- Product Manage Content -->
      <div class="card" style="background: #f3f5fa">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h2 style="color: #283a5ae6;">Manage Stock</h2>
            </div>

             <!-- Success Message -->
        @if(session('success'))
        <div class="alert alert-success mt-4">
          {{ session('success') }}
        </div>
        @endif

            <hr style="border: 1px solid #283a5ae6">
            <!-- Rest of the content -->
            
          <div class="table-responsive">
            <table id="mytable" class="table table-hover">
              <thead>
                <tr>
                  <th>Product Image</th>
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Stock</th>
                </tr>
              </thead>
              <tbody>
               @foreach ($products as $product)
               <tr>
                <td><img height="50px" src="{{ asset('images/products/'.$product->photopath) }}" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>Rs. {{$product->price}}</td>
                <td>
                  <form action="{{route('user.sell.managestocks.update',$product->id)}}" method="POST">
                    @csrf
                    <input type="number" name="stock" value="{{$product->stock}}" id="edit-stock">
                    <button type="submit" class="btn-action">Edit</button>
                  </form>
                </td>
              </tr>
               @endforeach
 
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    let table = new DataTable('#mytable');
</script>



@endsection
