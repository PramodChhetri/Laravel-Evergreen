<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <h2>Seller Center</h2>
        <ol>
          <li><a href="{{ route('user.sell.index') }}">Home</a></li>
          <li>Seller Center</li>
        </ol>
      </div>
    </div>
  </section>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2 sidebar">
          <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.sell.index') }}">Seller Center</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('user.sell.managestocks') }}">Manage Stocks</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('user.sell.manageproducts') }}">Manage Products</a>
              </li>
              </ul>
      </div>