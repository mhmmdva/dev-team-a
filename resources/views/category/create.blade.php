@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mt-5">
            <a href="{{ route('category.create') }}" class="btn btn-primary" data-bs-target="#ModalCreate"
                data-bs-toggle="modal">
                <i class="bi bi-plus-lg"></i>
                Create
            </a>
        </div>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title text-dark">Create Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('category.store') }}" method="POST" class="d-inline-block">
                        @csrf
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Input category name">

                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Create</button>
                    </form>
                </div>
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
