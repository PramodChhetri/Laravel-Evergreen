{{-- Cart Icon --}}
<div id="cart-icon">
  <i class='bx bx-cart'></i>
  <span class='badge badge-warning' id='lblCartCount'> {{$cartcount}} </span>
</div>

<div id="notification-icon">
  <i class='bx bx-bell'></i>
  <span class='badge badge-warning' id='lblCartCount'> 1 </span>
</div>

</nav><!-- .navbar -->

{{-- Cart --}}
<div class="cart">
  <div class="cart-container">
      <h2 class="cart-title">YOUR CART</h2>
      @php
      $sum = 0
      @endphp
      {{-- Content --}}
      @foreach ($carts as $cart)
      <div class="cart-content">
          <div class="cart-box">
              <img src="{{ asset('images/products/'.$cart->product->photopath)}}" alt="" class="cart-img">
              <div class="detail-box">
                  <div class="cart-product-title">{{$cart->product->name}}</div>
                  <div class="cart-price">Rs. {{$cart->product->price}}</div>
                  <div>
                    <button class="cart-btn" wire:click="decreaseQty({{$cart->id}})">-</button>
                    <span class="cart-quantity">{{$cart->quantity}}</span>
                    <button class="cart-btn" wire:click="incrementQty({{$cart->id}})">+</button>
                    
                  </div>
                  @php
                  $sum = $sum + ($cart->quantity * $cart->product->price) 
                  @endphp
              </div>
              {{-- Remove Cart --}}
              <a wire:click.prevent="removeCart('{{$cart['id']}}')"> <i class='bx bxs-trash-alt cart-remove'></i></a>

          </div>
      </div>

      @endforeach

      {{-- Total --}}
      <div class="total">
          <div class="total-title">Total</div>
          <div class="total-price">Rs. {{$sum}}</div>
      </div>
      {{-- Buy Button --}}
      <a href="{{route('user.checkout')}}"><button class="btn-buy">Buy Now</button></a>

      {{-- Cart Close --}}
      <i class='bx bx-x' id="close-cart"></i>

  </div>
</div>
