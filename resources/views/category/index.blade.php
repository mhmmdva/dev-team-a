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
                    <a href="{{ route('category.index') }}"
                        class="{{ $active === 'Category' ? 'active' : '' }} text-decoration-none">List Category
                    </a>
                </li>

                {{-- <li class="breadcrumb-item">
                <a href="{{ route('category.show') }}"
                    class="{{ $active === 'Category' ? 'active' : '' }}  text-muted text-decoration-none">Show
                </a>
            </li> --}}

                <li class="breadcrumb-item active">
                    <a href="{{ route('category.create') }}"
                        class="{{ $active === 'Category' ? 'active' : '' }}  text-muted text-decoration-none">Create
                    </a>
                </li>

            </ol>
        </nav>
    </div>

    {{-- start cards --}}
    @foreach ($category as $categories)
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center pt-3 pb-2 mb-3 ">
            <div class="card mt-3 col-lg-8 shadow mb-5 bg-body rounded ">

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-center">
                        <div class="card-body cards-category-name">
                            <h1 class="ms-5 card-title">{{ $categories->name }}</h1>
                            <button class="ms-5 col-lg-4 btn btn-dark">View</button>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="{{ asset('assets/users/images/breaking-news-zoom-virtual-background-video-design-template-a8bc63cc142d10b6d482df50cd70acd1_screen.jpg') }}"
                            class="rounded-end img-fluid" style="width: 100%" alt="...">
                    </div>

                </div>

            </div>

        </div>
    @endforeach
    {{-- end cards --}}
@endsection
