<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 sidebar">
        <div style="text-align: center; margin: 10px;">
            <h4 style="color: #37517e; ">Filter Products</h4>
        </div>
         
         <form wire:submit.prevent="updated">
          <div class="search-bar">
            <input wire:model="name" style="width: 100%; padding: 6px 12px; outline: none; border: 2px solid #ddd; border-radius: 4px;"
            type="text" placeholder="Search Here" wire:model="search">
          </div>
          
          <div class="form-group">
            <label class="form-label" for="min-price">Price Range:</label>
            <div class="price-input-group"  style="display: flex;
            align-items: center;">
              <input wire:model="minprice" type="number" class="form-control form-control-price" style="flex: 1;
              height: 40px;
              border: 1px solid #ddd;
              border-radius: 5px;
              padding: 5px;" id="min-price" placeholder="Min" min="0" max="1000" step="10">
              <span class="separator" style="margin: 0 10px;
              font-weight: bold;">-</span>
              <input wire:model="maxprice" type="number" class="form-control form-control-price" style="flex: 1;
              height: 40px;
              border: 1px solid #ddd;
              border-radius: 5px;
              padding: 5px;" id="max-price" placeholder="Max" min="0" max="1000" step="10">
            </div>
          </div>

          <div class="form-group">
            <label for="category">Category:</label>
            <div>
                <div class="checkbox-group">
                      <div class="form-check" style="margin-left: 10px;">
                      <input class="form-check-input" wire:model="category" type="checkbox" id="All" value="all">
                      <label class="form-check-label" for="All">All</label>
                      </div>
                      </div>
                @foreach ($categories as $category)

                      <div class="checkbox-group">
                      <div class="form-check" style="margin-left: 10px;">
                      <input class="form-check-input" wire:model="category" type="checkbox" id="{{ $category->name }}" value="{{ $category->id }}">
                      <label class="form-check-label" for="{{ $category->name }}">{{ $category->name }}</label>
                      </div>
                      </div>
                    
                @endforeach
            </div>
        </div>
        

          <div class="form-group">
            <label class="form-label">Condition:</label>
            <div class="checkbox-group">
            <div class="form-check" style="margin-left: 10px;">
            <input wire:model="condition" class="form-check-input" type="checkbox" id="New" value="New">
            <label class="form-check-label" for="New">New</label>
            </div>
            </div>
            <div class="checkbox-group">
            <div class="form-check" style="margin-left: 10px;">
            <input wire:model="condition" class="form-check-input" type="checkbox" id="Fairly New" value="FairlyNew">
            <label class="form-check-label" for="Fairly New">Fairly New</label>
            </div>
            </div>
            <div class="checkbox-group">
            <div class="form-check" style="margin-left: 10px;">
            <input wire:model="condition"  class="form-check-input" type="checkbox" id="Old" value="Old">
            <label class="form-check-label" for="Old">Old</label>
            </div>
            </div>
            </div>

         </form>
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
                  <a href="{{ asset('images/products/'.$product->photopath) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$product->name}}" style="height: 45px"><i class='bx bx-zoom-in'></i></i></a>
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
</div>
</div>
