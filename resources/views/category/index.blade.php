@extends('layouts.app')

@section('content')
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
