@extends('layouts.master_innerpage')
@section('content')

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Products</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Products</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  @if(session('success'))
  <div class="alert alert-success mt-4">
    {{ session('success') }}
  </div>
  @endif


  <livewire:product-filter />
  

   

@endsection