@extends('layouts.app')

@section('content')
    <h3 style="margin-left: 75px; margin-top: 20px;">Trending</h3>
    <div class="container">
        <div class="row justify-content-start">
            @forelse ($posts as $post)
                <div class="card my-2 mx-2"
                    style="box-shadow: 1px 1px 4px rgba(0,0,0,.5); width: 18rem; margin-left: 75px; margin-bottom: 10px;">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-1">
                                <img src="{{ $post->user->photo() }}" width="25" height="25" class="rounded-circle">
                            </div>
                            <div class="col-md-8 ms-2 fw-bold">
                                <a href="{{ route('profile.index', $post->user->name) }}"
                                    class="title text-decoration-none text-dark">
                                    {{ $post->user->name }}
                                </a>
                                <a href="{{ route('category.show', $post->category->name) }}"
                                    class="title text-decoration-none text-dark">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                        </div>

                        <a href="{{ route('posts.show', $post->slug) }} " class="text-decoration-none text-dark">
                            <h5 class="fs-6 card-title">{{ $post->title }}</h5>
                        </a>
                        @foreach ($post->tags as $tag)
                            <a href="{{ route('tags.show', $tag->name) }}" class="text-decoration-none">
                                <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                            </a>
                        @endforeach
                        <div class="mt-3 d-flex justify-content-between">
                            <span class="position-relative me-lg-2 p-1 m-0 fs-6">
                                <a type="button" class=" text-decoration-none text-dark likesIcon"
                                     post_id={{ $post->id }} user_id={{ auth()->user()->id }}>
                                    <i class="text-danger bi {{auth()->user()->likedPosts()->where('post_id', $post->id)->count() > 0 ? 'bi-heart-fill' : 'bi-heart'}}"></i>
                                </a>

                                <span type="button" class="likesCount">
                                    @if ($post->likedUsers()->count() > 0)
                                        <span data-toggle="modal" data-target="#userModal{{ $post->id }}" class="font-weight-bold">
                                            {{ $post->likedUsers()->count() }} Likes
                                        </span>
                                    @endif
                                </span>
                            </span>

                            <span class="likes position-relative me-lg-2 p-1 m-0 fs-6">
                                <a href="{{ route('bookmark', $post->id) }}" class=" text-decoration-none text-dark">
                                    <i onclick="changeInconLikes(this)" class="bi bi-bookmark-check-fill"></i>
                                </a>
                                <span type="button">
                                    @if ($post->bookmarks()->count() > 0)
                                        <span id="showUserList" data-toggle="modal"
                                            data-target="#userBookmarkModal{{ $post->id }}" class="font-weight-bold">
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
                    </div>
                </div>
                <!-- Modal Likes -->
                <div class="modal fade align-middle" id="userModal{{ $post->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="userModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modalLikes{{$post->id}}">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="userModal">{{ $post->likedUsers->count() }} likes for
                                    "{{ $post->title }}"</h5>
                                <div type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </div>
                            </div>
                            <div class="modal-body">
                                @foreach ($post->likedUsers as $users)
                                    <div>
                                        <img src="{{ auth()->user()->photo() }}" width="40" height="40"
                                            class="rounded-circle mb-2"> {{ $users->name }}
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Bookmarks -->
                <div class="modal fade align-middle" id="userBookmarkModal{{ $post->id }}" tabindex="-1"
                    role="dialog" aria-labelledby="userModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="userBookmarkModal">{{ $post->bookmarks->count() }} people that bookmark
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
            @empty
                <p style="margin-left: 75px; margin-top: 20px;">No posts yet.</p>
                {{-- {{ $posts->links() }} --}}
            @endforelse
        </div>

    </div>

@endsection

@push('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script>
        $('.likesIcon').on("click", function (evt) {
            evt.preventDefault();
            var _this = $(this);
            var user_id = _this.attr("user_id");
            var post_id = _this.attr("post_id");
            var data = {
                "user_id": user_id,
                "post_id": post_id,
                "_method": 'POST',
            };

            $.ajax({
                url: "/like/"+post_id,
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                dataType: 'JSON',
                data: JSON.stringify(data),
                success: function(response){
                    console.log('it works!');

                    location.reload(true);
                },
                error: function(xhr){
                    alert('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                }
            });
        });
    </script>
@endpush
