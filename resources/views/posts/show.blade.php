@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="margin-top: 20px; margin-bottom: 20px;">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <img src="{{ $post->image() }}" class="img-fluid img-image" width="60%"><br><br>
                        <b>Category by: {{ $post->category->name }}</b>
                        </div>
                            <div class="p-2">
                                <h3> {{ $post->title }} </h3>
                                @foreach ($post->tags as $tag )
                                <a href="{{ route('tags.index', $tag->slug) }}" class="text-decoration-none" >
                                    <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                                </a>
                                @endforeach
                            </div>

                                <div class="card-body">
                                    <div class="text-center">
                                    </div>
                                    <p class="card-text" style="font-family: Open Sans; text-align: justify;"><?=$post->content ?></p>
                                </div>

                                <div class="mt-3 d-flex justify-content-between" style="margin-left: 10px; margin-bottom: 10px;">
                                    <button type="button" class="likes btn btn-danger position-relative me-lg-5 p-1 m-0 fs-6">
                                        <i class="bi bi-heart"></i> <i class='bx bx-like align-middle'></i> Likes
                                        <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">+22
                                            <span class="visually-hidden">unread messages</span>
                                        </span>
                                    </button>

                                    <button type="button" class="btn btn-outline-warning" style="margin-right: 10px;">
                                        <i class="bi bi-bookmark-star"></i>
                                    </button>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
