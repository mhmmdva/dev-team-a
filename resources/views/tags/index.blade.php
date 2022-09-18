@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center cards-category-name">
        <h1 class="card-title">
            <a href="{{ route('tags.create') }}" class="text-decoration-none"> Tags</a>
        </h1>
    </div>

    <div class="d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center pt-3 pb-2 mb-3 ">
        <div class="card mt-3 col-lg-7 shadow  bg-body rounded ">

            <div class="row">

                <div class="col-lg-12 d-flex align-items-center ">

                    <div class="card-body cards-category-name">
                        {{-- <h2 class="card-title py-2 border-bottom">{{ auth()->user()->name }}</h2> --}}
                        <h3 class="card-title mt-3 text-center border-bottom border-2 border-dark">All Tags in Websites
                        </h3>

                        @forelse ($tags as $tag)
                            <a href="{{ route('tags.show', $tag->name) }}"
                                class="tags btn btn-light card-title mt-3  border rounded-5 text-decoration-none">
                                #{{ $tag->name }}
                            </a>
                        @empty
                            <p>No tags yet.</p>
                        @endforelse

                        {{-- <div class="mt-3 d-flex justify-content-between">

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


                        </div> --}}

                    </div>
                </div>

            </div>

        </div>
    </div>
   
@endsection
