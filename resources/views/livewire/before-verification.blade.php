
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
            <form wire:submit.prevent>
              <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" placeholder="Enter your address">
              </div>
              <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" id="contact" placeholder="Enter your contact number">
              </div>
              <div class="form-group">
                <label for="pan-no">PAN No:</label>
                <input type="text" class="form-control" id="pan-no" placeholder="Enter your PAN number">
              </div>
              <div class="form-group">
                <label for="pan-photo">PAN Photo:</label>
                <input type="file" class="form-control-file" id="pan-photo">
              </div>
              <button type="submit" class="btn-submit">Submit</button>
            </form>
          </div>
        </div>
        
    </div>
  </div>
</section>
