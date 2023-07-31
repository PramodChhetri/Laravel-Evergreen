@extends('layouts.master_innerpage')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Profile</h2>
            <ol>
                <li><a href="{{ route('user.index') }}">Home</a></li>
                <li>Profile</li>
            </ol>
        </div>
    </div>
</section>

<style>
    /* Center the card on the page */
    #profile-picture {
        margin-top: 10px;
        border-radius: 8px;
        border: 4px solid #fff; /* Add a light gray border */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle box-shadow */
    }

    /* Adjust the size and alignment of the profile picture */
    .img-fluid {
        max-width: 250px;
        max-height: 200px;
        display: block;
        margin-left: 0;
        margin-right: auto;
        border: 2px solid black; /* Add border to the profile picture */
        border-radius: 50%;
        padding: 5px; /* Add some padding to the profile picture */
    }

    /* Style the form and button */
    .profile-form {
        margin-top: 30px;
    }

    .profile-form label {
        font-weight:700;
        margin-bottom: 10px;
    }

    .profile-form input[type="file"] {
        display: block;
        width: 100%;
        margin-top: 10px;
        margin-bottom: 20px;
        background: black;
        color: #fff;
    }
</style>

<section>
    <div class="container" id="profile-picture">
        <div class="row">
            <div class="col-md-10">
                <div class="card-header bg-white ">
                    <h4>
                        {{ __('Profile Picture') }}
                    </h4>
                    <p>
                        {{ __("Update your account's profile picture") }}
                    </p>

                    <form method="post" action="{{ route('profile.update') }}" class="profile-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="image">{{ __('Change Image') }}</label>
                            <img class="img-fluid" src="{{ asset('images/users/' . Auth::user()->image) }}" alt="User Image">
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
