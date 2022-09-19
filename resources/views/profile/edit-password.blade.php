@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- success notification --}}
                @if (session()->has('success-update-password'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success-update-password') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="mb-3" style="font-weight: 700;">
                    <div>
                        <span>Edit Profile for </span>
                        <span style="color: #5DAAC4">{{ auth()->user()->name }}</span>
                    </div>
                </h1>

                <nav class="navbar navbar-expand-lg">
                    <div id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-secondary"
                                    href="{{ route('profile.edit-profile', $user->username) }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark"
                                    href="{{ route('profile.edit-password', $user->username) }}">Password</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update-password', $user->username) }}">
                            @csrf
                            @method('PATCH')

                            {{-- current password --}}
                            <div class="row my-3 mx-5">
                                <h2 style="color: #5DAAC4; font-weight: 700">Set New Password</h2>
                                <label for="current_password">Current password</label>

                                <div class="col-md">
                                    <input id="current_password" type="password"
                                        class="form-control @error('current_password') is-invalid @enderror"
                                        name="current_password" autocomplete="current_password">

                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- new password --}}
                            <div class="row mb-3 mx-5">
                                <label for="password">New password</label>

                                <div class="col-md">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- confirm new password --}}
                            <div class="row mb-3 mx-5">
                                <label for="password-confirm">Confirm new password</label>

                                <div class="col-md mb-4">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            {{-- button --}}
                            <div class="row mb-3 mx-5 float-end">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 12rem; height:2.5rem; background-color: #5DAAC4; border-color:#5DAAC4;">Set
                                        New Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
