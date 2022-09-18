@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center">

        <h1>
            <a href="{{ route('category.create') }}" class="text-decoration-none"> Category </a>
            <a href="#" class="btn btn-light"></a>
        </h1>

    </div>
    {{-- start cards --}}
    @foreach ($categories as $category)
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-center align-items-center pt-3 pb-2 mb-3 ">
            <div class="card mt-3 col-lg-8 shadow mb-5 bg-body rounded ">

                <div class="row">

                    <div class="col-lg-5 d-flex align-items-center">
                        <div class="card-body cards-category-name">
                            <h1 class="ms-5 card-title">{{ $category->name }}</h1>
                            <button class="ms-5 col-lg-4 btn btn-dark">View</button>
                        </div>
                    </div>
                    @foreach ($category->posts as $post)
                        <div class="col-md-7">
                            <img src="{{ $post->image() }}" class="rounded-end img-fluid" style="width: 100%"
                                alt="...">
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
    @endforeach

    {{-- end cards --}}
@endsection
