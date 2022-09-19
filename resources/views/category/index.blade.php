@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-cente cards-category-name">

        <h1>
            <a href="{{ route('category.create') }}" class="title text-decoration-none"> Category </a>
        </h1>

    </div>

    @if (session()->has('success'))
        <div class="container">
            <div class="alerts alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong> You should check it out
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif


    <div class="container">
        <div class="row mt-5">
            @foreach ($categories as $category)
                <div class="col-lg-4 mb-5 align-content-center justify-content-center cards-category">
                    <div class="card">
                        <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img-top"
                            alt="{{ $category->name }}">
                        <div class="card-body">
                            <h5 class=" card-title">
                                <a href="#" class="title text-decoration-none">
                                    {{ $category->name }}
                                </a>
                            </h5>
                            <a href="#" class=" btn btn-primary">Go To Post</a>
                            <a href="{{ route('category.edit', $category->name) }}" class="btn btn-warning">
                                Edit <i class="bi bi-pencil-fill"></i>
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal">
                                Delete <i class="bi bi-trash"></i>
                            </button>


                            <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content bg-danger alert-category">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white">Are you sure?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-white">
                                            <p>This is irreversible action, think carefully!.</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('category.destroy', $category->name) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-dark">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- end cards --}}
@endsection
