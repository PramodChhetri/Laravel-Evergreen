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
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input id="email" class="form-input" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                @if ($errors->has('email'))
                    <span class="form-error">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="form-group">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                @if ($errors->has('password'))
                    <span class="form-error">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                @if ($errors->has('password_confirmation'))
                    <span class="form-error">{{ $errors->first('password_confirmation') }}</span>
                @endif
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn btn-dark">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
</section>

@endsection
