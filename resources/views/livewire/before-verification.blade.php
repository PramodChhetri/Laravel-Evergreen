
<section id="registration" class="registration section-bg">
  <div class="container">
    <div class="section-title">
      <h2>Business Registration</h2>
      <p>Register your business with us by providing the following details:</p>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div id="register-business">
          <div class="form-wrapper">
            <form method="POST" action="{{ route('user.sell.updatepan', ['id' => Auth::user()->id]) }}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Enter your address">
              </div>
              @error('address')
                 <p class="text-danger mx-2">{{ $message }}</p>
              @enderror
              <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" name="phone" class="form-control" id="contact" placeholder="Enter your contact number">
              </div>
              @error('phone')
                 <p class="text-danger mx-2 ">{{ $message }}</p>
              @enderror
              <div class="form-group">
                <label for="pan-no">PAN No:</label>
                <input type="text" name="pannumber" class="form-control" id="pan-no" placeholder="Enter your PAN number">
              </div>
              @error('pannumber')
                 <p class="text-danger mx-2 ">{{ $message }}</p>
              @enderror
              <div class="form-group">
                <label for="panimage">PAN Photo:</label>
                <input type="file" name="panimage" class="form-control-file" id="panimage" wire:model="panphoto">
              </div>
              @error('panimage')
                 <p class="text-danger mx-2">{{ $message }}</p>
              @enderror
              <div class="form-group">
                @if ($panphoto)
                  <div class="form-group">
                  <label>Preview:</label>
                  <img src="{{ $panphoto->temporaryUrl() }}" alt="PAN Photo Preview" width="200">
                  </div>
                @endif
              </div>
              <button type="submit" class="btn-submit">Submit</button>
            </form>
          </div>
        </div>
        
    </div>
  </div>
</section>
