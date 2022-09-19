@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="card col-lg-8 mt-5 mb-5 cards-category-name p-4">
                <h1 class="mt-3 card-title">Edit Tag</h1>
                <form action="{{ route('tags.update', $tag->name) }}" method="POST"
                    class="d-inline-block col-lg-12 mt-1 mb-5">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" id="name" name="name" placeholder="Input category name"
                        value="{{ old('name') ?? $tag->name }}">
                    <button type="submit" class="mt-4 btn btn-dark">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
