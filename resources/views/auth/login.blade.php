@extends('layouts.app-user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign in with</h5>
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

                    <div class="row">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <!-- <div class="form-group mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-warning btn-sm px-4 py-1">Sign in</button>
                                </div>
                            </div>

                            <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif -->
                        </form>
                        <p class="text-center">Don't have an account?<a href="{{ route('register') }}"> Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
