@extends('layouts.master_innerpage')
@section('content')
<style>
  .sidebar-container {
      display: block;
  }

  .sidebar-container.hide {
    display: none;
      
  }

</style>

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container-lg">

      <div class="d-flex justify-content-between align-items-center">
        <!-- Sidebar Toggle Button -->
        <button id="sidebar-toggle" class="toggle-button focus-none" style="color: #37517e; border:none; font-size: 1rem;">
         <strong> <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h8m-8 6h16"></path>
          </svg>
          Filter Products
        </strong>
      </button>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Products</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->



  <livewire:product-filter />
  

   

@endsection