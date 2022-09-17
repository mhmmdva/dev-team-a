@extends('layouts.category.app')

@section('content')
    <div class="container">
        <nav aria-label=" breadcrumb" class="border-bottom">
            <ol class="mt-3 breadcrumb">
                <li class="breadcrumb-item"><a href=""
                        class="{{ $active === 'User' ? 'active' : '' }} text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('category.index') }}"
                        class="{{ $active === 'List' ? 'active' : '' }} text-decoration-none">List</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}"
                        class="{{ $active === 'About' ? 'active' : '' }} text-decoration-none">About</a></li>
            </ol>
        </nav>
    </div>

    {{-- start cards --}}
    @foreach ($category as $categories)
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center pt-3 pb-2 mb-3 ">
            <div class="card mt-3 col-md-8">

                <div class="row g-0">

                    <div class="col-lg-5">
                        <div class="mt-5 card-body cards-category-name">
                            <h5 class="card-title">{{ $categories->name }}</h5>
                            <button class="btn btn-dark">View</button>
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
