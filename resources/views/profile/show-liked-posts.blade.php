@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center mt-4">
        {{-- <h1 class="card-title"> --}}

            <h1 style="font-weight: 900">
                <span>{{auth()->user()->name}}'s</span>
                <span>Liked Post</span>
            </h1>

        </h1>
    </div>

    @forelse ($user->likedPosts as $post)
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

                                <span class="likes position-relative me-lg-5 p-1 m-0 fs-6">
                                    <a href="{{ route('bookmark', $post->id) }}" class=" text-decoration-none text-dark">
                                        <i onclick="changeInconLikes(this)" class="bi bi-bookmark-check-fill"
                                            id="likesIcon"></i>
                                    </a>
                                    <span type="button">
                                        @if ($post->bookmarks()->count() > 0)
                                            <span id="showUserList" data-toggle="modal" data-target="#userBookmarkModal"
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
        <div class="modal fade align-middle" id="userBookmarkModal" tabindex="-1" role="dialog"
            aria-labelledby="userModal" aria-hidden="true">
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
        <p class="p-5">No Liked Post Yet</p>
    @endforelse
@endsection

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
