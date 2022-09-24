@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center tag-category">

        <h1 class="title mt-5 text-decoration-none">
            <a href="{{ route('tags.index') }}" class="links">Tag</a>
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
        <div class="row">
            <div class="col-lg-12 pt-3 pb-2 mb-3 d-flex justify-content-center align-content-center">
                <div class="card mt-3 shadow rounded bg-white">
                    <div class="card-body cards-category-name tag-category ">
                        <h3 class="card-title text-center border-bottom border-2 p-1">
                            All Tags in Websites
                        </h3>

                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap flex-lg-wrap">
                                @forelse ($tags as $tag)
                                    <a href="{{ route('tags.show', $tag->slug) }}"
                                        class="tags btn btn-light card-title mt-3 m-1 border rounded text-decoration-none ">
                                        #{{ $tag->name }}
                                    </a>
                                @empty
                                    <p>No tags yet.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
