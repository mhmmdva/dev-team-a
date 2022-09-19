@extends('layouts.app')

@section('content')
    <div class="container">

        @forelse ($post as $posts)
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $posts->title }}</h5>
                    <a href="{{ route('profile.index', $posts->user->name) }}">{{ $posts->user->name }}</a>
                    <a class="card-subtitle mb-2 text-decoration-none"
                        href="{{ route('category.index', $posts->category->name) }}">Category by :
                        {{ $posts->category->name }}</a>
                    <p class="card-text">{!! $posts->content !!} </p>
                    @foreach ($tag as $tags)
                        <a href="{{ route('tags.show', $tags->name) }}" class="col text-decoration-none">
                            <span class="badge rounded-pill text-bg-danger mb-2">#{{ $tags->name }}</span>
                        </a>
                    @endforeach
                </div>
            </div>

        @empty
            <p>No Post Yet.</p>
        @endforelse
    </div>
@endsection
