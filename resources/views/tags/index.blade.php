@extends('layouts.app')

@section('content')
    <div class="container">
        <nav aria-label=" breadcrumb" class="border-bottom">
            <ol class="mt-3 breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#" class="{{ $active === 'User' ? 'active' : '' }}  text-muted text-decoration-none">Home
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('tags.index') }}"
                        class="{{ $active === 'List' ? 'active' : '' }} text-decoration-none">List Tag
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('tags.show') }}"
                        class="{{ $active === 'List' ? 'active' : '' }} text-muted text-decoration-none">Show
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    <a href="{{ route('tags.create') }}"
                        class="{{ $active === 'Category' ? 'active' : '' }} text-muted text-decoration-none">Create
                    </a>
                </li>

            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <h1>
            Tag <a href="#" class="btn btn-light">#Data</a>
        </h1>
    </div>

    @foreach ($tags as $tag)
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center pt-3 pb-2 mb-3 ">
            <div class="card mt-3 col-lg-7 shadow  bg-body rounded ">

                <div class="row">

                    <div class="col-lg-12 d-flex align-items-center ">

                        <div class="card-body cards-category-name">
                            <h2 class="card-title py-2 border-bottom">Leonel Messi</h2>
                            <h3 class="card-title mt-3">Data Bola This Year</h3>
                            @foreach ($tags as $tag)
                                <button type="button"
                                    class="tags btn btn-light card-title mt-3  border rounded-5">#{{ $tag->name }}
                                </button>
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
    @endforeach
@endsection
