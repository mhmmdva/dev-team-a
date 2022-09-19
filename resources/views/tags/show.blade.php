@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center cards-category-name">
        <h1 class="card-title">
            <a href="{{ route('tags.create') }}" class="text-decoration-none"> Tags</a>
            <a href="" class="btn btn-light">#{{ $tag->name }}</a>
            <div class="card-header">
                Posts By <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>

            </div>
        </h1>
    </div>

    @forelse ($posts as $post)
        <div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 ">

            <div class="card mt-3 col-lg-7 shadow  bg-body rounded ">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-center ">
                        <div class="card-body cards-category-name">
                            {{-- <h3 class="card-title mt-3 text-center border-bottom border-2 border-dark">
                                @foreach ($post->tags as $tag)
                                    Posts By : <span
                                        class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                                @endforeach
                            </h3> --}}
                            <h1 class="card-title">{{ $post->title }}</h1>
                            <h6 class="text-muted">author : {{ auth()->user()->name }}</h6>

                            @foreach ($post->tags as $tag)
                                <a href="{{ route('tags.show', $tag->name) }}" class="col text-decoration-none">
                                    <span class="badge rounded-pill text-bg-secondary mb-2">#{{ $tag->name }}</span>
                                </a>
                            @endforeach


                            <div class="mt-3 d-flex justify-content-between">
                                <span class="likes position-relative me-lg-5 p-1 m-0 fs-6">
                                    <a href="{{ route('like', $post->id) }}" class=" text-decoration-none text-dark">
                                        <i onclick="changeIconLikes(this)" class="bi bi-heart text-danger" id="likesIcon"></i>
                                    </a>
                                    <span type="button">
                                        @if ($post->likes()->count() > 0)
                                            <span id="showUserList" data-toggle="modal" data-target="#userModal{{ $post->id }}"
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

                                <button type="button" class="btn btn-outline-warning">
                                    <i class="bi bi-bookmark-star"></i>
                                </button>


                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>
        <!-- Modal -->
        <div class="modal fade" id="userModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="userModal">{{$post->likes->count()}} people that likes "{{$post->title}}"</h5>
                <div type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                </div>
                <div class="modal-body">
                    @forelse ($post->likes as $like)
                        <div>
                            <img src="{{ $like->photo() }}" width="40" height="40" class="rounded-circle mb-2"> {{$like->name}}
                        </div>

                    @empty
                        no data!
                    @endforelse
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}

    {{-- <script>
        $(document).ready(function(){
            $('#likesIcon').click(function(){
                $(#likesIcon).toggleClass('bi bi-heart-fill text-danger');
            });
        });
    </script> --}}
@endpush
