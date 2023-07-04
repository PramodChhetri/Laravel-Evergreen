@extends('layouts.master_innerpage')
@section('content')


 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Portfolio Details</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="portfolio.html">Portfolio</a></li>
          <li>Portfolio Details</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              </div>

              <div class="swiper-slide">
                <img src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              </div>

              <div class="swiper-slide">
                <img src="{{ asset('images/products/'.$product->photopath) }}" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>{{$product->name}}</h3>
            <ul>
              <li><strong>Seller</strong>: {{$product->user->name}}</li>
              <li><strong>Category</strong>: {{$product->category->name}}</li>
              <li><strong>Condition</strong>: {{$product->condition}}</li>
              <li><strong>Price</strong>: Rs. {{$product->price}}</li>
              <li><strong>Available</strong>: {{$product->stock}} Piece</li>
              <li><strong>Brand</strong>: {{$product->brand}}</li>
              <li><strong>Detail</strong>: {{$product->description}}</li>
            </ul>
            @if(session('success'))
            <div class="alert alert-success mt-4">
              {{ session('success') }}
            </div>
            @endif
            <p class="fs-5 text-danger">
              <form action="{{route('user.orders.cart.store')}}" method="POST">
                @csrf
              <input type="hidden" name="product_id" value="{{$product->id}}"> 
              <input type="number" name="quantity" value="1" class="cart-quantity">
              <button type="submit" style="border: none; background-color: #fff;" class="text-success" ><i class="bx bx-plus"></i> Add to Card</button>
            </form>
            </p>
          </div>
          
      </div>

    </div>
  </section><!-- End Portfolio Details Section -->

<div class="container-fluid" style=" background:#f3f5fa;">
  <ul class="nav nav-tabs beautiful-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Related Products</a>
    </li>
    <li class="nav-item" role="presentation" >
      <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Feedbacks</a>
    </li>
  </ul>
  
  <div class="tab-content beautiful-tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <div class="related-portfolio">
            <div class="row portfolio-container" >  {{-- data-aos="fade-up" --}}
       
                @foreach ($relatedproducts as $product)
          
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
                      <button type="submit" id="add-to-cart">+</button>
                      </form>
                    </div>
            
                  </div>
                </div>   
          
                @endforeach
          
              </div>
        </div>
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style=" background:#f3f5fa;">
    
      <div style="padding: 5px; ">
        <form action="{{route('user.feedbacks.store')}}" method="POST">
          @csrf
          @error('feedback')
                <Span class="text text-danger">Please Enter Something!</Span>
          @enderror
          <textarea name="feedback" id="default" placeholder="Give Feedback Here"></textarea>
          <input type="hidden" name="product_id" value="{{$product->id}}"> 
          <input type="submit" class="btn-add" style="margin-top: 10px;">
        </form>
      </div>
        <div class="row" style=" margin-top:20px;">
            <div class="col-lg-12">
             <div>
              <h5 style="border-bottom: 2px solid #333;">Latest Feedbacks</h5>
              @foreach ($feedbacks as $fb)
              <div>
                  <span style="padding-top: 10px;">{{$fb->user->name}}</span>
                  <div style="border-bottom: 1px solid #333; padding-bottom: 3px; font-style: italic; display: flex; align-items: center;">
                      <sup><i class="bx bxs-quote-alt-left quote-icon-left"></i></sup>
                      <p>{!! html_entity_decode($fb->feedback) !!}</p>
                      <sup><i class="bx bxs-quote-alt-right quote-icon-right"></i></sup>
                  </div>
              </div>
          @endforeach
          
            </div>
            </div> 
        </div>

    </div>
  </div>
</div>

<script>
  var tab = new bootstrap.Tab(document.getElementById('myTab'))
  tab.show()
</script>
  @endsection