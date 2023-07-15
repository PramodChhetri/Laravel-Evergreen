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

    .card-text {
        margin-bottom: 20px;
        color: #666;
    }

    .text-gray {
        color: #666;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
    }

    .form-input {
        padding: 8px;
        border-radius: 4px;
        border: 1px solid #ccc;
        width: 100%;
        font-size: 14px;
    }

    .form-error {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
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
</style>

<section class="" style="background-color: #9A616D;">


<div class="container mt-30  container-box">
    <div class="card">
        <div class="card-text mb-4 text-sm text-gray-900">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <span class="form-error">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-dark">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>

</section>

@endsection
