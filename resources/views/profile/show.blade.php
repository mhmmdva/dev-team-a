@extends('layouts.app')

@section('content')
<div class="container">
    <h2 style="font-weight: 700;">Profile</h2>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="col-md-4 my-3">
                            <center><img src="{{ Auth::user()->photo() }}" width="150" height="150" class="rounded-circle"><br>
                                <a type="button" class="btn btn-warning btn-sm mt-2" href="{{ route('profile.edit-profile', $user->username) }}"> Edit Profile</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row justify-content-center">
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control form-control-sm" name="name" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control form-control-sm" name="username" value="{{ Auth::user()->username }}" disabled>
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input id="email" type="text" class="form-control form-control-sm" name="email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h2 class="mt-4" style="font-weight: 700;">Article by <span style="color: #5DAAC4">{{ Auth::user()->name }}</span></h2>
    <div class="card mb-4">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $key => $post)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="3">No Post Yet.</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
