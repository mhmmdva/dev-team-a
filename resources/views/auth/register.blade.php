@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="text-center">Sign up with</h5>

                    <div class="row justify-content-center align-items-center my-4">
                        <div class="col-md-2">
                            <a class="btn" href="#"><i class="bi bi-google"></i></a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn" href="#"><i class="bi bi-twitter"></i></a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn" href="#"><i class="bi bi-facebook"></i></a>
                        </div>
                        <div class="col-md-2">
                            <a class="btn" href="#"><i class="bi bi-github"></i></a>
                        </div>
                    </div>

                    <p class="text-center text-muted mb-4">or</p>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label>{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group mb-3">
                            <label for="username">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-warning btn-sm px-4 py-1">Sign up</button>
                            </div>
                        </div>
                    </form>
                    <p class="text-center">Have an account?<a href="{{ route('login') }}"> Sign in</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
