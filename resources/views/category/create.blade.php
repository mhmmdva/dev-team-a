@extends('layouts.app')

@section('content')
    {{-- Modal Create --}}
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="card col-lg-8 mt-5 mb-5 cards-category-name p-4">
                <h1 class="mt-3 card-title">Create Category</h1>
                <form action="{{ route('category.store') }}" method="POST" class="d-inline-block col-lg-12 mt-1 mb-5">
                    @csrf
                    <input type="text" class="form-control" id="name" name="name" placeholder="Input category name">
                    <button type="submit" class="mt-4 btn btn-dark">Create</button>
                </form>
                {{-- <button type="button" class="mt-4 btn btn-dark">
                    <a href="{{ route('category.edit', $category->name) }}">Create</a>
                </button> --}}
            </div>
        </div>
    </div>

    {{-- <div class="container">
        <div class="mt-4 table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Created_At</th>
                        <th scope="col">Updated_At</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class=" table-group-divider">
                    @foreach ($category as $categories)
                        <tr>
                            <td>{{ $categories->name }}</td>
                            <td>{{ $categories->updated_at->format('Y-M-d / H:i:s') }}</td>
                            <td>{{ $categories->created_at->format('Y-M-d / H:i:s') }}</td>
                            <td>
                                <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm"
                                    data-bs-target="#ModalCreate" data-bs-toggle="modal">
                                    <i class="bi bi-plus-lg"></i>
                                    Create
                                </a>
                                <a href="{{ route('category.edit', $categories->id) }}"
                                    class="btn btn-warning btn-sm text-white">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#Modal{{ $categories->id }}">
                                    <i class="bi bi-trash"></i>
                                    Delete
                                </button>
                            </td>
                        </tr>


                        <div class="modal fade" id="Modal{{ $categories->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-white">Are you sure?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-white">
                                        <p>This is irreversible action, think carefully!.</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <form action="{{ route('category.destroy', $categories->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-dark">Delete</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
@endsection
