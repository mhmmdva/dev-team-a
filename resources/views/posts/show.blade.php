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
                        <img src="{{ $post->image() }}" class="img-fluid d-block mx-auto img-image" width="60%"><br>
                        <h6 class="text-muted">
                            <a href="{{ route('category.index', $post->user->name) }}"
                                class="title text-decoration-none text-dark">
                                Category by: {{ $post->category->name }}
                            </a>
                        </h6>
                    </div>
                    <div class="p-2 post">
                        <h3 class="title"> {{ $post->title }} </h3>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tags.index', $tag->slug) }}" class="text-decoration-none">
                                <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                            </a>
                        @endforeach
                        <div class="row mt-5">
                            <div class="col-md-1 px-1">
                                <img src="{{ $post->user->photo() }}" width="50" height="50" class="rounded-circle">
                            </div>
                            <div class="col-md-5">
                                <a href="{{ route('profile.index', $post->user->name) }}"
                                    class="title text-decoration-none text-dark">
                                    <h4>{{ $post->user->name }}</h4>
                                </a>
                                <p class="text-muted">Last Created {{ $post->created_at->diffForhumans() }}</p>

                                <div class="col-md-4 ms-1">
                                    <a href="{{ route('profile.index', $post->user->name) }}"
                                        class="title text-decoration-none text-dark">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div style="font-family: Open Sans; text-align: justify" class="card-text">
                                <?= htmlspecialchars_decode($post->content) ?>
                            </div>
                        </div>

                        <div class="mt-3 d-flex justify-content-between" style="margin-left: 10px; margin-bottom: 10px;">
                            <span class="likes position-relative me-lg-5 p-1 m-0 fs-6">
                                <a href="{{ route('like', $post->id) }}" class=" text-decoration-none text-dark">
                                    <i onclick="changeIconLikes(this)" class="bi bi-heart text-danger" id="likesIcon"></i>
                                </a>
                                <span type="button">
                                    @if ($post->likes()->count() > 0)
                                        <span id="showUserList" data-toggle="modal"
                                            data-target="#userModal{{ $post->id }}" class="font-weight-bold">
                                            @if ($post->likes()->count() == 1)
                                                {{ $post->likes()->count() }} Like
                                            @else
                                                {{ $post->likes()->count() }} Likes
                                            @endif
                                        </span>
                                    @endif
                                </span>
                            </span>

                            <span class="likes position-relative me-lg-2 p-1 m-0 fs-6">
                                <a href="{{ route('bookmark', $post->id) }}" class=" text-decoration-none text-dark">
                                    <i onclick="changeInconLikes(this)" class="bi bi-bookmark-check-fill"
                                        id="likesIcon"></i>
                                </a>
                                <span type="button">
                                    @if ($post->bookmarks()->count() > 0)
                                        <span id="showUserList" data-toggle="modal" data-target="#userBookmarkModal{{ $post->id }}"
                                            class="font-weight-bold">
                                            @if ($post->bookmarks()->count() == 1)
                                                {{ $post->bookmarks()->count() }} Save
                                            @else
                                                {{ $post->bookmarks()->count() }} Saved
                                            @endif
                                        </span>
                                    @endif
                                </span>
                            </span>
                        </div>
                        @can('owner', $post)
                            <div class="row justify-content-between">
                                <div class="col-sm-1 me-4">
                                    <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-primary"
                                        style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Edit</a>
                                </div>
                                <div class="col">
                                    <form id="delete-post" action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            style="width: 5rem; margin-bottom: 10px; margin-left: 10px">Delete</button>
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
    </div>
    </div>
    <!-- Modal Like -->
    <div class="modal fade" id="userModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="userModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="userModal">{{ $post->likes->count() }} people that likes
                        "{{ $post->title }}"</h5>
                    <div type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
                <div class="modal-body">
                    @foreach ($post->likes as $users)
                        <div>
                            <img src="{{ $users->photo() }}" width="40" height="40" class="rounded-circle mb-2">
                            {{ $users->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bookmarks -->
    <div class="modal fade align-middle" id="userBookmarkModal{{ $post->id }}" tabindex="-1" role="dialog"
        aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="userBookmarkModal">{{ $post->likes->count() }} people that bookmark
                        "{{ $post->title }}"</h5>
                    <div type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                </div>
                <div class="modal-body">
                    @foreach ($post->bookmarks as $users)
                        <div>
                            <img src="{{ $users->photo() }}" width="40" height="40"
                                class="rounded-circle mb-2"> {{ $users->name }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endpush
