@extends('layouts.category.app')

@extends('layouts.category.sidebar-left')

@section('content')
    <div class="container">
        <div class="mt-4 col-lg-10">
            <h1>Edit Your Tag</h1>
            <form method="post" action="{{ route('tags.update', $tags->id) }}">
                @csrf
                @method('PATCH')

                <div class="mt-3">
                    <label for="name" name="name" class="form-label">Tags</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') ?? $tags->name }}">
                </div>
                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
