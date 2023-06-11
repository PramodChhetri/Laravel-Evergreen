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
          <a class="nav-link" href="">Seller Center</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Manage Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">Manage Orders</a>
        </li>
        </ul>
    </div>
    <div class="col-md-10 content">
          <!-- Your page content goes here -->
        

<!-- ======= Sell Products Section ======= -->
<section id="sell-products" class="sell-products">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="section-title">
          <h2>Seller Center</h2>
          <p>Reach millions of customers and grow your business.</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="sell-product-item">
              <div class="icon"><i class="bi bi-upload"></i></div>
              <h3>Upload Your Products</h3>
              <p>Easily upload your product images, descriptions, and other details to our platform.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="sell-product-item">
              <div class="icon"><i class="bi bi-wallet2"></i></div>
              <h3>Earn Money</h3>
              <p>Start earning money by selling your products to our large customer base.</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="sell-product-item">
              <div class="icon"><i class="bi bi-shield-check"></i></div>
              <h3>Secure Transactions</h3>
              <p>Our platform ensures secure transactions and protects both buyers and sellers.</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="sell-product-item">
              <div class="icon"><i class="bi bi-globe2"></i></div>
              <h3>Global Reach</h3>
              <p>Expand your business globally and reach customers from around the world.</p>
            </div>
          </div>
        </div>

        <div class="text-center mt-1000">
          <a href="" class="btn-get-started">Get Started</a>
        </div>

      </div>
    </div>
  </div>
</section>

</div>
</div>
</div>
@endsection
