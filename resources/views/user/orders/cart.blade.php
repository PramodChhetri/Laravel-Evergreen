@extends('layouts.master_innerpage')
@section('content')

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Orders</h2>
        <ol>
          <li><a href="{{route('user.index')}}">Home</a></li>
          <li>Orders</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  {{-- Content Starts Here --}}

    
<div class="container-fluid">
    <div class="row">
    <div class="col-md-2 sidebar">
       <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.orders.index')}}">Current Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Order History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('user.orders.cart')}}">Cart</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10 content">
          <!-- Your page content goes here -->
          
    </div>
    </div>
</div>


 


@endsection