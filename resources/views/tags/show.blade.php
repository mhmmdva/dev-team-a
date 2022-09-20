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
                                <span class="likes position-relative me-lg-5 p-1 m-0 fs-6">
                                    <a href="{{ route('like', $post->id) }}" class=" text-decoration-none text-dark">
                                        <i onclick="changeIconLikes(this)" class="bi bi-heart text-danger"
                                            id="likesIcon"></i>
                                    </a>
                                    <span type="button">
                                        @if ($post->likes()->count() > 0)
                                            <span id="showUserList" data-toggle="modal" data-target="#userModal"
                                                class="font-weight-bold">
                                                @if ($post->likes()->count() == 1)
                                                    {{ $post->likes()->count() }} Like
                                                @else
                                                    {{ $post->likes()->count() }} Likes
                                                @endif
                                            </span>
                                        @endif
                                    </span>
                                </span>

                                <span class="likes position-relative me-lg-5 p-1 m-0 fs-6">
                                    <a href="{{ route('bookmark', $post->id) }}" class=" text-decoration-none text-dark">
                                        <i onclick="changeInconLikes(this)" class="bi bi-bookmark-check-fill"
                                            id="likesIcon"></i>
                                    </a>
                                    <span type="button">
                                        @if ($post->bookmarks()->count() > 0)
                                            <span id="showUserList" data-toggle="modal" data-target="#userModal"
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
                                {{-- <a href="{{ route('bookmark', $post->id) }}" class=" text-decoration-none text-dark">
                                    <i onclick="changeIconLikes(this)" class="bi bi-heart text-danger" id="likesIcon"></i>
                                </a>
                              
                                <button type="button" class="bookmark btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    Bookmark <i class="bi bi-bookmark-star"></i> 1
                                </button> --}}

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Add Bookmark</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                You want to save it ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="">
                                                    <button type="button" class="btn btn-primary">Save Changes</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>
        <!-- Modal -->
        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal"
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
                                <img src="{{ $users->photo() }}" width="40" height="40"
                                    class="rounded-circle mb-2"> {{ $users->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No Post Yet.</p>
    @endforelse
@endsection

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
@endpush
