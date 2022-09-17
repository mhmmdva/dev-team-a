@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-4 mb-5 col-lg-10">
            <h1>Create Your Tag</h1>
            <form method="post" action="{{ route('tags.store') }}">
                @csrf
                <div class="mt-3">
                    <ltbel for="name" name="name" class="form-label">Tags</ltbel>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tags">
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
