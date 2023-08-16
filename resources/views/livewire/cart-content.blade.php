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

{{-- Notification --}}
<div class="notification">
  <div class="notification-container">
      <h2 class="notification-title">Notifications</h2>
      <div class="d-flex justify-content-end mb-3">
          <a href="" class="text-right text-dark"><u>See all</u></a>
      </div>
      <ul class="list-unstyled">
          <li class="px-2 py-3">
              <div>
                  <p class="m-0"><b>11:59 PM</b></p>
                  <p class="m-0">Notification 1</p>
              </div>
          </li>
          <li class="px-2 py-3">
            <div>
                <p class="m-0"><b>11:59 PM</b></p>
                  <p class="m-0">Notification 2</p>
              </div>
          </li>
          <li class="px-2 py-3">
            <div>
                <p class="m-0"><b>11:59 PM</b></p>
                  <p class="m-0">Notification 3</p>
              </div>
          </li>
          <li class="px-2 py-3">
            <div>
                <p class="m-0"><b>11:59 PM</b></p>
                  <p class="m-0">Notification 4</p>
              </div>
          </li>
          <li class="px-2 py-3">
            <div>
                <p class="m-0"><b>11:59 PM</b></p>
                  <p class="m-0">Notification 5</p>
              </div>
          </li>
      </ul>
      <div class="d-flex justify-content-center mt-3">
        <a href="" class="text-center text-dark"><u>Clear all</u></a>
    </div>
      <i class='bx bx-x' id="close-notification"></i>

  </div>
</div>