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
          <p>Rs. {{$product->price}}</p>
          <div style="display:flex;">
            <a href="{{ asset('images/products/'.$product->photopath) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$product->name}}"><i class='bx bx-zoom-in'></i></i></a>
            <input type="number" value="1" id="products-quantity">
          <i class="bx bx-plus" id="product-plus-icon" style=""></i>
          </div>
  
        </div>
      </div>   

      @endforeach

    </div>

  </div>
</section><!-- End Portfolio Section -->


@endsection