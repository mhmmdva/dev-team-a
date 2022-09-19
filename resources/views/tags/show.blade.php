@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center tag-category">
        <h1 class="card-title">

            <a href="{{ route('tags.create') }}" class="title text-decoration-none"> Tags</a>
            <a href="" class="tags btn btn-light">#{{ $tag->name }}</a>

            <a href="{{ route('tags.edit', $tag->name) }}" class="btn btn-warning">
                Edit <i class="bi bi-pencil-fill"></i>
            </a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#Modal">
                Delete <i class="bi bi-trash"></i>
            </button>

            <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content bg-danger alert-tags">
                        <div class="modal-header">
                            <h5 class="modal-title text-white">Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-white">
                            <p>This is irreversible action, think carefully!.</p>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('tags.destroy', $tag->name) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-dark">Delete</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </h1>
    </div>

    @forelse ($posts as $post)
        <div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 ">

            <div class="card mt-3 col-lg-8 shadow  bg-body rounded ">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-center ">
                        <div class="card-body cards-category-name user-category bg-white rounded">

                            <h6 class="text-muted">
                                <a href="{{ route('profile.index', $post->user->name) }}"
                                    class="title text-decoration-none">
                                    {{ $post->user->name }}
                                </a>
                            </h6>

                            <p class="text-muted mb-4">Last updated {{ $post->created_at->diffForhumans() }}</p>
                            <h1 class="title card-title">
                                <a href="#" class="text-decoration-none">{{ $post->title }}</a>
                            </h1>


                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tags.show', $tag->name) }}" class="col text-decoration-none">
                                    <span class="badge rounded-pill text-bg-danger mb-2">#{{ $tag->name }}</span>
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

                </div>

            </div>


        </div>
    @empty
        <p>No Post Yet.</p>
    @endforelse
@endsection
