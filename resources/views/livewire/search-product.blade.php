<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 sidebar">
         <h2 style="color: #37517e; ">Filter</h2>
          <div class="search-bar">
            <input style="
            position: relative;
            width: 300px;
            padding: 8px 12px;
            border: none;
            outline: none;
            color: #444444;
            border-radius: 4px;
            box-shadow: 2px 2px 4px #566172;"
             type="text" placeholder="Search Here" wire:model="search">
          </div>
    </div>
    <div class="col-md-9 content">


 <!-- ======= Portfolio Section ======= -->
 <section id="portfolio" class="portfolio">
  <div class="container">

    <div>
      <div class="row portfolio-container" >  {{-- data-aos="fade-up" --}}
 
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
                <button type="submit" id="add-to-cart">+</button>
                </form>
              </div>
      
            </div>
          </div>   
    
          @endforeach
    
        </div>

        {{ $products->links()}}

        <style>
          svg{
            width: 20px;
          }
        </style>

  </div>
  
   

  </div>
</section><!-- End Portfolio Section -->

</div>
</div>
