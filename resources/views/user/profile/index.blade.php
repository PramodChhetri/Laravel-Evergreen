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
    .profile-container {
        margin-bottom: 15px;
        border-radius: 8px;
        border: 4px solid #fff; /* Add a light gray border */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a subtle box-shadow */
    }

    /* Adjust the size and alignment of the profile picture */
    .profile-picture .img-fluid {
        max-width: 250px;
        max-height: 200px;
        display: block;
        margin-left: 0;
        margin-right: auto;
        border: 2px solid black; /* Add border to the profile picture */
        border-radius: 50%;
        padding: 5px; /* Add some padding to the profile picture */
    }

    .pan-picture .img-fluid {
        max-width: 300px;
        max-height: 250px;
        display: block;
        margin-left: 0;
        margin-right: auto;
        border: 2px solid black; /* Add border to the profile picture */
        border-radius: 20%;
        padding: 5px; /* Add some padding to the profile picture */
    }
    
    /* Style the form and button */
    .profile-form {
        margin-top: 30px;
    }

    .profile-form label {
        font-weight:600;
    }

    .profile-form input[type="file"] {
        display: block;
        width: 100%;
        margin-top: 10px;
        margin-bottom: 20px;
        background: black;
        color: #fff;
    }
    .profile-form input {
        display: block;
        width: 100%;
        margin-bottom: 20px;
        background: black;
        color: #fff;
    }
</style>


    <div class="container profile-container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-10">
                <div class="card-header bg-white ">
                    <h4>
                        {{ __('Profile Picture') }}
                    </h4>
                    <p>
                        {{ __("Update your account's profile picture") }}
                    </p>

                    <form method="post" action="{{ route('user.profile.changeprofileimage') }}" class="profile-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group profile-picture">
                            <label for="image">{{ __('Change Image') }}</label>
                            <img class="img-fluid" src="{{ asset('images/users/' . Auth::user()->image) }}" alt="User Image">
                            <input type="file" name="image" id="image" class="form-control-file" required>
                        </div>
                        <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container profile-container">
        <div class="row">
            <div class="col-md-11">
                <div class="card-header bg-white ">
                    <h4>
                        {{ __('Profile Information') }}
                    </h4>
                    <p>
                        {{ __("Update your account's profile information and email address.") }}
                    </p>

                    <form method="post" action="{{ route('user.profile.changeprofileinfo') }}" class="profile-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{old('name', Auth::user()->name)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{old('name', Auth::user()->email)}}" required>
                        </div>
                        <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container profile-container">
        <div class="row">
            <div class="col-md-11">
                <div class="card-header bg-white ">
                    <h4>
                        {{ __('Update Password') }}
                    </h4>
                    <p>
                        {{ __("Ensure your account is using a long, random password to stay secure.") }}
                    </p>

                    <form method="POST" action="{{ route('user.profile.changeprofilepassword') }}" class="profile-form">
                        @csrf

                        <div class="form-group">
                            <label for="current-password">{{ __('Current Password') }}</label>
                            <input type="password" name="current-password" id="current-password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="new-password">{{ __('New Password') }}</label>
                            <input type="password" name="new-password" id="new-password" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="new-password-confirm">{{ __('Confirm New Password') }}</label>
                            <input type="password" name="new-password_confirmation" id="new-password-confirm" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container profile-container">
        <div class="row">
            <div class="col-md-11">
                <div class="card-header bg-white ">
                    <h4>
                        {{ __('Business Information') }}
                    </h4>
                    <p>
                        {{ __("Update your contact and PAN information.") }}
                    </p>
    
                    <form method="post" action="{{ route('user.profile.changebusinessinfo') }}" class="profile-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="contact">{{ __('Address') }}</label>
                            <input type="text" name="address" id="contact" class="form-control" value="{{old('name', Auth::user()->address)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('Phone Number') }}</label>
                            <input type="tel" name="phone" id="phone" class="form-control" value="{{old('name', Auth::user()->phone)}}" required>
                        </div>
                        <div class="form-group pan-picture">
                            <label for="pan-image">{{ __('PAN Image') }}</label>
                            <img class="img-fluid" src="{{ asset('images/pan/' . Auth::user()->panimage) }}" alt="User Image">
                            <input type="file" name="panimage" id="pan-image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="pan-number">{{ __('PAN Number') }}</label>
                            <input type="text" name="pannumber" id="pan-number" class="form-control" value="{{old('name', Auth::user()->pannumber)}}" required>
                        </div>
                        <button type="submit" class="btn btn-dark">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container profile-container" style="margin-top: 25px;">
        <div class="row">
            <div class="col-md-10">
                <div class="card-header bg-white ">
                    <h4>
                        {{ __('Delete Account') }}
                    </h4>
                    <p>
                        {{ __("Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.") }}
                    </p>
    
                    <a class="btn btn-danger" id="btn-action-delete" data-user-id="{{ Auth::user()->id }}">Delete</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="deleteModal" class="modal">
        <div class="modal-dialog">
            <div class="modal-content bg-white p-4 rounded-lg">
                <form action="{{ route('user.profile.destroy') }}" method="POST">
                    @csrf
                    <p class="modal-title text-2xl">Are you sure you want to delete?</p>
                    <input type="hidden" name="dataid" id="dataid" value="">
                    <div class="modal-footer justify-center">
                        <input type="submit" value="Yes" class="btn btn-primary mx-2">
                        <a id="btn-cancel" class="btn btn-danger mx-2">No</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            // Event delegation for dynamically generated elements
            $('body').on('click', '#btn-action-delete', function() {
                var userId = $(this).data('user-id'); // Change 'product-id' to 'user-id'
                $('#dataid').val(userId);
                $('#deleteModal').modal('show');
            });
    
            $('#btn-cancel').on('click', function() {
                $('#deleteModal').modal('hide');
            });
    
            $('#deleteModal').on('hidden.bs.modal', function() {
                $('#dataid').val('');
            });
        });
    </script>
    
    

@endsection
