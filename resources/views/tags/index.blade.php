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
        <div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 ">

            <div
                class=" card mt-3 col-lg-8 shadow  rounded bg-white d-flex flex-wrap flex-lg-wrap justify-content-between justify-content-center align-items-center">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body cards-category-name tag-category">
                            <h3 class="card-title text-center border-bottom border-2 p-1">
                                All Tags in Websites
                            </h3>

                            <div class="col-md-9">
                                <div
                                    class="d-flex flex-wrap flex-lg-wrap justify-content-between justify-content-center align-items-center">
                                    @forelse ($tags as $tag)
                                        <a href="{{ route('tags.show', $tag->name) }}"\
                                            class="tags btn btn-light card-title mt-3  border rounded text-decoration-none ">
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
                {{ $tags->links() }}
            </div>

        </div>
    </div>
    </div>
@endsection
