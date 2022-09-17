@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                                <a class="nav-link text-dark"
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
                        <form method="POST" action="{{ route('profile.update-profile', $user->username) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            {{-- photo --}}
                            <div class="row my-3 mx-5">
                                <h2 style="color: #5DAAC4; font-weight: 700">User</h2>
                                <label for="photo">Photo</label>

                                <div class="col-md">
                                    <input id="photo" type="file"
                                        class="form-control @error('photo') is-invalid @enderror" name="photo"
                                        value="{{ old('photo') ?? $user->photo() }}" autofocus>

                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- name --}}
                            <div class="row mb-3 mx-5">
                                <label for="name">Name</label>

                                <div class="col-md mb-4">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ auth()->user()->name }}" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- button --}}
                            <div class="row mb-3 mx-5 float-end">
                                <div class="col-md">
                                    <button type="submit" class="btn btn-primary"
                                        style="width: 12rem; height:2.5rem; background-color: #5DAAC4; border-color:#5DAAC4;">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
