@extends('layouts.master_innerpage')
@section('content')

<style>
  .submit-button {
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    background-color: #4CAF50;
    color: #fff;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .submit-button:hover {
    background-color: #45a049;
  }
</style>



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


  <div class="container-fluid">
    <div class="row">
    <div class="col-md-3 sidebar">
       <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Filter</a>
        </li>
    </div>
    <div class="col-md-9 content">


 <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio">
  <div class="container">

    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
          <li data-filter=".filter-New">New</li>
          <li data-filter=".filter-FairlyNew">Fairly New</li>
          <li data-filter=".filter-Old">Old</li>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up">

      @foreach ($products as $product)

      <div class="col-lg-4 col-md-6 portfolio-item filter-{{$product->condition}}">
        <a href="{{route('user.productdetail',$product->id)}}">
          <div class="portfolio-img"><img src="{{ asset('images/products/'.$product->photopath) }}" class="img-fluid" alt=""></div>
          <div class="portfolio-info">
          </a>
          <h4>{{$product->name}}</h4>
          <p>Rs. {{$product->price}} (Available: {{$product->stock}})</p>
          <div style="display:flex;">
            <a href="{{ asset('images/products/'.$product->photopath) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$product->name}}"><i class='bx bx-zoom-in'></i></i></a>
            <form action="{{route('user.orders.cart.store')}}" method="POST">
              @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}"> 
            <input type="number" name="quantity" value="1" id="products-quantity">
            <button id="add-to-cart">+</button>
            </form>
          </div>
  
        </div>
      </div>   

      @endforeach

    </div>

  </div>
</section><!-- End Portfolio Section -->

    </div>
  </div>
  

@endsection