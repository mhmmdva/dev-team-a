@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">

                {{-- success notification --}}
                @if (session()->has('success-update-profile'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success-update-profile') }}
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

                            <div class="row my-3 mx-5">
                                <h2 class="mb-4" style="color: #5DAAC4; font-weight: 700">User</h2>
                                <div class="d-flex align-items-center">

                                    {{-- photo --}}
                                    <div class="col-2" style="position: relative;">

                                        <input id="changeProfilePhoto" type="file" class="d-none @error('photo') is-invalid @enderror"
                                            name="photo" value="{{ old('photo') }}" autofocus
                                            onchange="this.dispatchEvent(new InputEvent('input'))">

                                        <a href="#" onclick="event.preventDefault();document.getElementById('changeProfilePhoto').click();">
                                            <i class="fa fa-camera rounded-circle p-3"
                                                style="color:black;top: 50%;left: 50%;position: absolute;transform: translate(-50%, -50%);
                                                    background-color:#5DAAC4; opacity: 0.8; cursor: pointer;">
                                            </i>
                                        </a>

                                        <img src="{{ $user->photo() }}" alt='profile-photo' class="rounded-circle w-100" id="img">
                                        @error('photo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- name --}}
                                    <div class="flex-grow-1 ms-5">
                                        <label for="name">Name</label>
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

@push('head')
    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    {{-- toastr notification --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

    {{-- ijabo crop tool --}}
    <link rel="stylesheet" href="{{ asset('ijaboCropTool/ijaboCropTool.min.css') }}"/>
@endpush

@push('script')
    {{-- toastr notification --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    {{-- ijabo crop tool --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('ijaboCropTool/ijaboCropTool.min.js') }}"></script>

    <script>
        $('#changeProfilePhoto').ijaboCropTool({
           preview : '',
           setRatio:1,
           allowedExtensions: ['jpg', 'jpeg','png'],
           buttonsText:['CROP','QUIT'],
           buttonsColor:['#30bf7d','#ee5155', -15],
           processUrl:'{{ route("profile.change-profile-photo", $user->username) }}',
           withCSRF:['_token','{{ csrf_token() }}'],
           onSuccess:function(message, element, status){
            $('.card').load(document.URL +  ' .card');
           },
           onError:function(message, element, status){
             alert(message);
           }
        });
   </script>
@endpush
