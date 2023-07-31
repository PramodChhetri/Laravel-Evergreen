@extends('layouts.master_innerpage')

@section('content')

{{-- ajax script --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Checkout</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>Checkout</li>
      </ol>
    </div>
  </div>
</section>


<section id="checkout" class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Billing Details</h3>
            <form method="POST" action="{{route('user.orders.store')}}">
              @csrf
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Eg: Axel Blade" required>
                  @error('name')
                  <div class="message-error">
                    Valid first name is required.
                  </div> 
                  @enderror
                  
                </div>
              </div>
              
              <div class="mb-3">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <div class="input-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                </div>
                @error('email')
                  <div class="message-error">
                  Please enter a valid email address.
                  </div>
                @enderror
              </div>
            
              
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" required>
                @error('address')
                <div class="message-error">
                  Please enter your address.
                </div>
                @enderror
              </div>
              
              <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</span></label>
                <input type="text" class="form-control" id="contact" name="contact" placeholder="+97798xxxxxxxx or +977xxxxxx" required>
                @error('contact')
                <div class="message-error">
                  Please select a valid Number.
                </div>
                @enderror
              </div>
              
              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="country" class="form-label">Country</label>
                  <input type="text" class="form-control" id="country" name="country" placeholder="Eg: Nepal" required>
                  @error('country')
                  <div class="message-error">
                    Please select a valid country.
                  </div>
                  @enderror
                </div>
                
                <div class="col-md-4 mb-3">
                  <label for="state" class="form-label">State</label>
                  <input type="text" class="form-control" id="state" name="state" placeholder="Eg: Gandaki" required>
                  @error('state')
                  <div class="message-error">
                    Please provide a valid state.
                  </div>
                  @enderror
                </div>
                
                <div class="col-md-3 mb-3">
                  <label for="zip" class="form-label">Zip</label>
                  <input type="text" class="form-control" id="zip" name="zip" placeholder="Eg: 33003" required>
                  @error('zip')
                  <div class="message-error">
                    Zip code required.
                  </div>  
                  @enderror
                </div>
              </div>
              
              
          </div>
        </div>
      </div>
      
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Order Summary</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Product</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $totalPrice = 0;
                @endphp
               @foreach ($carts as $cart)
               <tr>
                <td>{{$cart->product->name}}</td>
                <td>Rs. {{$cart->product->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->product->price * $cart->quantity}}</td>
              </tr>   
              @php
                $totalPrice += $cart->product->price * $cart->quantity;
              @endphp

              <input type="hidden" name="cart_ids[]" value="{{ $cart->id }}">

               @endforeach

                <tr>
                  <td colspan="3" class="text-end">Total</td>
                  <td>Rs. {{$totalPrice}}</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="m-4">
            <span><b>Payment Options</b></span>
                <hr>
              <button class="btn-add" type="submit">Cash On Delivery</button>
            </form>
            <button id="payment-button" class="btn-khalti">Pay with Khalti</button>
          </div>
        </div>

        </div>
      </div>
    </div>
  </section>

  
  <style>
      /* Custom CSS */
      .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      }
    
      .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
      }
    
      .form-label {
        font-weight: bold;
      }

      .btn-khalti {
    background-color: #5E338D;
    color: #FFFFFF;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s;
    display: inline-block;
  }

  .btn-khalti:hover {
    background-color: #FF2D79;
    color: #fff;
  }

  </style>

<script>
  var config = {
  // replace the publicKey with yours
  publicKey: "test_public_key_b0d6db159004497c9244add1125f253c",
  productIdentity: "1234567890",
  productName: "55",
  productUrl: "http://127.0.0.1:8000/user/7/productdetail",
  paymentPreference: [
    "KHALTI",
    "EBANKING",
    "MOBILE_BANKING",
    "CONNECT_IPS",
    "SCT"
  ],
  eventHandler: {
    onSuccess: function(payload) {
      // hit merchant API for initiating verification
      console.log(payload);
      if (payload.idx) {
        $.ajaxSetup({
          headers: {
            "X-CSRF-TOKEN": '{{csrf_token()}}'
          }
        });

        $.ajax({
          method: "post",
          url: "{{route('ajax.khalti.verify_order')}}",
          data: payload,
          success: function(response) {
            if (response.success == 1) {
              window.location = response.redirect;
            } else {
              checkout.hide();
            }
          },
          error: function(data) {
            console.log("Error:", data);
          }
        });
      }
    },
    onError: function(error) {
      console.log(error);
    },
    onClose: function() {
      console.log("Widget is closing");
    }
  }
};

var checkout = new KhaltiCheckout(config);
var btn = document.getElementById("payment-button");
btn.onclick = function() {
  // minimum transaction amount must be 10, i.e., 1000 in paisa.
  checkout.show({ amount: 1000 });
};

</script>


@endsection