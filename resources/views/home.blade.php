@extends('layouts.app')

@section('content')
    <div style="background:#4F6EAC" class="jumbotron jumbotron-fluid pb-3">
        <div class="container">
                <i style="font-family: Open Sans" class="display-6 text-white">SELAMAT DATANG DI WEBSITE TEAM A</i>
                <p class="text-white" style="font-family: Open Sans; text-align: justify">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas, similique? Porro quisquam aut harum autem fuga nam? Optio placeat nulla vitae ipsa esse facilis neque cum sint, expedita dicta delectus totam corrupti amet suscipit eum reprehenderit nam consequatur ipsum incidunt iure dolorum quia. Voluptas, enim placeat non modi quaerat veritatis?</p>
        </div>
    </div>
    <h3 style="margin-left: 75px; margin-top: 20px;">Trending</h3>
    @forelse ($posts as $post)
            <div class="card" style="width: 18rem; margin-left: 75px; margin-bottom: 10px;">
                <div class="card-body">
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <a href="{{ route('posts.show', $post->slug) }}">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </a>
                    @foreach ($post->tags as $tag )
                                <a href="{{ route('tags.index', $tag->slug) }}" class="text-decoration-none" >
                                    <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                                </a>
                    @endforeach
                    <div class="mt-3 d-flex justify-content-between">
                        <button type="button" class="likes btn btn-danger position-relative me-lg-5 p-1 m-0 fs-6">
                            <i class="bi bi-heart"></i> <i class='bx bx-like align-middle'></i> Likes
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">+22
                                <span class="visually-hidden">unread messages</span>
                            </span>
                        </button>

                        <button type="button" class="btn btn-outline-warning">
                            <i class="bi bi-bookmark-star"></i>
                        </button>
                   </div>
                </div>
            </div>
            @empty
            <p>No posts yet.</p>
                    {{ $posts->links() }}
                </div>
            </div>
    @endforelse
@endsection
