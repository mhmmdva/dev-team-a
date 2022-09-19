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
            <!-- Modal -->
            <div class="modal fade align-middle" id="userModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                    <h5 class="modal-title" id="userModal">{{$post->likes->count()}} people that likes "{{$post->title}}"</h5>
                    <div type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </div>
                    </div>
                    <div class="modal-body">
                        @foreach ($post->likes as $users)
                            <div>
                                <img src="{{ $users->photo() }}" width="40" height="40" class="rounded-circle mb-2"> {{$users->name}}
                            </div>
                        @endforeach
                    </div>
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

@push('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endpush
