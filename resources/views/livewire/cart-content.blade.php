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
              <input type="number" value="{{$cart->quantity}}" class="cart-quantity">
              @php
              $sum = $sum + ($cart->quantity * $cart->product->price) 
              @endphp
            </div>
            {{-- Remove Cart --}}
            <i class='bx bxs-trash-alt cart-remove' ></i>
        </div>
          </div>
            
        @endforeach

          {{-- Total --}}
          <div class="total">
            <div class="total-title">Total</div>
            <div class="total-price">Rs. {{$sum}}</div>
          </div>
        {{-- Buy Button --}}
        <button class="btn-buy">Buy Now</button>

        {{-- Cart Close --}}
        <i class='bx bx-x' id="close-cart"></i>

      </div>
    </div>