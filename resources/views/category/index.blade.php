@extends('layouts.category.app')

@section('content')
    <nav aria-label=" breadcrumb">
        <ol class="mt-3 breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">List</a></li>
            <li class="breadcrumb-item active">About</li>
        </ol>
    </nav>

    {{-- start cards --}}
    @foreach ($category as $categories)
        <div class="flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
            <div class="card mt-3 col-md-8">

                <div class="row g-0">

                    <div class="col-lg-5">
                        <div class="mt-5 card-body">
                            <h5 class="card-title">{{ $categories->name }}</h5>
                            <button class="btn btn-primary">Read</button>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <img src="{{ asset('assets/users/images/breaking-news-zoom-virtual-background-video-design-template-a8bc63cc142d10b6d482df50cd70acd1_screen.jpg') }}"
                            class="rounded-end img-fluid" style="width: 100%" alt="...">
                    </div>

                </div>

            </div>
            {{-- end --}}
        </div>
    @endforeach
    {{-- end cards --}}
@endsection
