@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <a class="btn btn-warning" href="{{ route('profile.edit-profile', $user->username) }}">Edit Profile</a>
    </div>
@endsection
