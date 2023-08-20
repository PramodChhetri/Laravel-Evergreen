@extends('layouts.master_innerpage')
@section('content')

<style>
    /* Your custom CSS styles go here */

/* Example notification card styling */
.card {
  border: 3px solid #ccc;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.notification-containers{
    border-bottom: 1px solid #a1a1a1;
    margin-bottom: 10px;
    padding-bottom: 4px;
    padding-inline: 4px;
}
.notification-containers:hover {
    background-color: #e1e1e1;
}

.notification-header{
    font-size: 1.5rem;
    font-weight: 700;
    background-color: #fff;
}

.card-header{
    border-bottom: 1px solid #a1a1a1;
}

.card-title {
  font-size: 1rem;
  font-weight: 700;
}

.card-text {
  color: #555;
}

.btn-primary {
  background-color: #007bff;
  border-color: #007bff;
}

.label-new {
  background-color: crimson;
  color: white;
  font-size: 0.8rem;
  padding: 2px 6px;
  border-radius: 4px;
  margin-left: 10px;
}

</style>

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Notifications</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Notification</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <<section id="notifications" class="py-5">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="notification-header"><b>Notifications</b></div>
                    <a href="{{route('user.notifications.markallasread')}}" style="color: #37517e; text-decoration: underline;">Mark as Read</a>
                </div>
                
                    <div class="card-body">
                        @foreach ($notifications as $ntf)
                        <a href="{{route('user.notification.redireact',$ntf->id)}}">
                          <div class="notification-containers">
                            <span class="card-title" style="color: #37517e;">{{ $ntf->created_at->format('h:i A, d-F-Y') }}</span>
                            @if ($ntf->status != 'Read')
                            <span class="label-new">New</span>
                            @endif
                            <p class="card-text">{{$ntf->content}}</p>
                        </div>
                        </a>
                        @endforeach
                        <div style="margin-top: 25px;">
                          {{ $notifications->links() }} <!-- Display pagination links -->
                        </div>
                      </div>

                      
                  </div>
              </div>
          </div>
      </div>
  </section>

  <style>
    svg{
      height: 20px;
    }
  </style>


@endsection