{{-- Cart Icon --}}
<div id="cart-icon">
  <i class='bx bx-cart'></i>
  <span class='badge badge-warning' id='lblCartCount'> {{$cartcount}} </span>
</div>

<div id="notification-icon">
  <i class='bx bx-bell'></i>
  <span class='badge badge-warning' id='lblCartCount'> {{$countnotification}} </span>
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
                    <a style="padding-inline: 8px; padding-top:4px; padding-bottom:4px;" class="cart-btn" href="{{route('user.orders.cart')}}">-</a>
                    <span class="cart-quantity">{{$cart->quantity}}</span>
                    <a class="cart-btn" style="padding-inline: 8px; padding-top:4px; padding-bottom:4px;" href="{{route('user.orders.cart')}}">+</a>
                    
                  </div>
                  @php
                  $sum = $sum + ($cart->quantity * $cart->product->price) 
                  @endphp
              </div>
              {{-- Remove Cart --}}
              <a href="{{route('user.orders.cart')}}"> <i class='bx bxs-trash-alt cart-remove'></i></a>

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
          <a href="{{route('user.notifications')}}" class="text-right text-dark"><u>See all</u></a>
      </div>
      <ul class="list-unstyled">
        <?php $count = 0 ?>
        @foreach ($queuenotification as $qn)
        <a href="{{route('user.notification.redireact',$qn->id)}}">
          <li class="px-2 py-3">
            <div>
                <p class="m-0" style="color: #37517e;"><b>{{ $qn->created_at->format('h:i A') }}</b></p>
                <p class="m-0 text-dark" style="font-weight: 400;">{{$qn->content}}</p>
            </div>
        </li>
        </a>
        <?php $count = $count + 1; ?>
        @endforeach
    </ul>
    <?php if($count != 0){  ?>
      <div class="d-flex justify-content-center mt-3">
        <a href="{{route('user.notifications.markallasunread')}}" class="text-center text-dark"><u>Clear all</u></a>
      </div>
    <?php } ?>

      <i class='bx bx-x' id="close-notification"></i>

  </div>
</div>