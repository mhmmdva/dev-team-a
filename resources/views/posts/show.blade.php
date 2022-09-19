@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4" style="box-shadow: 1px 1px 4px rgba(0,0,0,.5); margin-top: 20px; margin-bottom: 20px;">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <img src="{{ $post->image() }}" class="img-fluid d-block mx-auto img-image" width="60%"><br><br>
                        <b>Category by: {{ $post->category->name }}</b>
                        </div>
                            <div class="p-2">
                                <h3> {{ $post->title }} </h3>
                                @foreach ($post->tags as $tag )
                                <a href="{{ route('tags.index', $tag->slug) }}" class="text-decoration-none" >
                                    <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                                </a>
                                @endforeach
                                <h6 class="text-muted">Posted by : {{ $post->user->username  }}</h6>
                            </div>

                                <div class="card-body">
                                    <div style="font-family: Open Sans; text-align: justify" class="card-text">
                                        <?= htmlspecialchars_decode($post->content) ?>
                                    </div>
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
                               @can('owner', $post)
                               <div class="row justify-content-between">
                                <div class="col-sm-1 me-4">
                                    <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-primary" style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Edit</a>
                                </div>
                                <div class="col">
                                    <form id="delete-post" action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Delete</button>
                                    </form>
                                </div>
                               </div>
                             @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
