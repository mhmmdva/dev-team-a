@extends('layouts.category.app')

@extends('layouts.category.sidebar-left')


@section('content')
    <form method="post" action="{{ route('category.store') }}">
        @csrf
        <div class="mt-3">
            <ltbel for="name" name="name" class="form-label">Category</ltbel>
            <input type="text" class="form-control" id="name" name="name" placeholder="category">
        </div>
        <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    </form>
@endsection
