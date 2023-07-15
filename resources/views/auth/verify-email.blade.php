@extends('layouts.master_login')
@section('content')

<style>
    .container-box {
        max-width: 600px;
        margin: 170px auto;
    }

    .card {
        background-color: #f8f8f8;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .card-text {
        color: #666;
        margin-bottom: 20px;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-link {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .btn-link:hover {
        color: #0056b3;
    }
</style>

<section class="" style="background-color: #9A616D;">
<div class="container mt-30 container-box">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Thanks for signing up!</h5>
            <p class="card-text">
                Before getting started, please verify your email address by clicking on the link we just emailed to you.
                If you didn't receive the email, we will gladly send you another one.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success">
                    A new verification link has been sent to the email address you provided during registration.
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button type="submit" class="btn btn-dark">
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-dark">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
