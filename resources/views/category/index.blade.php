@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-cente cards-category-title">

        <h1 class="title mt-5 text-decoration-none">
            <a href="{{ route('category.index') }}" class="links">Category</a>
        </h1>

    </div>

    @if (session()->has('success'))
        <div class="container">
            <div class="alerts alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('success') }}</strong> You should check it out
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif


    <div class="container">
        <div class="row mt-5">
            @foreach ($categories as $category)
                <div class="col-lg-4 mb-5 align-content-center justify-content-center cards-category">
                    <div class="card">
                        <img src="https://source.unsplash.com/500x500?{{ $category->name }}" class="card-img-top"
                            alt="{{ $category->name }}">
                        <div class="card-body btn-titles">

                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('category.show', $category->slug) }}" class="title">
                                    {{ $category->name }}
                                </a>
                                <a href="{{ route('category.edit', $category->slug) }}"
                                    class="ms-2 text-decoration-none text-dark">
                                    <i class="icons bi bi-pencil-fill"></i>
                                </a>
                            </div>



                            <div class="d-flex">
                                <div class="ms-1 btn-categories">
                                    <a href="{{ route('category.show', $category->slug) }}"
                                        class="titles btn btn-primary text-decoration-none">
                                        Go To Post
                                    </a>

                                    <button type="button" class="titles btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#Modal">
                                        Delete <i class="bi bi-trash"></i>
                                    </button>

                                </div>
                            </div>

                            {{-- START MODAL EDIT --}}
                            <div class="modal fade" id="ModalEdit" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content bg-warning alert-category">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark">
                                                Are you sure you want to edit your Category ?
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body text-dark">
                                            <p>This is irreversible action, think carefully!.</p>
                                        </div>

                                        <div class="modal-footer">
                                            <form action="{{ route('category.update', $category->name) }}" method="POST"
                                                class="d-inline-block col-lg-12 mt-1 mb-5">
                                                @csrf
                                                @method('PUT')

                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Input category name"
                                                    value="{{ old('name') ?? $category->name }}">
                                                <div class="d-flex align-content-end justify-content-end">
                                                    <button type="submit" class="mt-3  btn btn-dark">Edit</button>
                                                    <button type="button" class="mt-3 ms-2 btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            {{-- END MODAL EDIT --}}

                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="Modal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content bg-danger alert-category">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white">Are you sure?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-white">
                                            <p>This is irreversible action, think carefully!.</p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="{{ route('category.destroy', $category->name) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-dark">Delete</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            {{-- MODAL DELETE --}}

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- end cards --}}
@endsection
