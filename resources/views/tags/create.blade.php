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
                        class="{{ $active === 'List' ? 'active' : '' }} text-muted text-decoration-none">List Tag
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('tags.show') }}"
                        class="{{ $active === 'List' ? 'active' : '' }}  text-muted text-decoration-none">Show
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    <a href="{{ route('tags.create') }}"
                        class="{{ $active === 'Category' ? 'active' : '' }} text-decoration-none">Create
                    </a>
                </li>

            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="mt-4 col-lg-10">
            <h1>Create Your Tag</h1>
            <form method="post" action="{{ route('tags.store') }}">
                @csrf
                <div class="mt-3">
                    <ltbel for="name" name="name" class="form-label">Tags</ltbel>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tags">
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
