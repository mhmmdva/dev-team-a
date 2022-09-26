@extends('layouts.app')

@section('content')
    <div class="container mt-4" style="font-family: 'Open Sans'">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1 class="mb-3" style="font-weight: 700;">Create Post</h1>
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            {{-- image --}}
                            <div class="row mb-3 mx-5">
                                <label for="image">Image</label>

                                <div class="col-md">
                                    <input id="image" type="file" accept="image/*"
                                        class="form-control @error('image') is-invalid @enderror" name="image">

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- title --}}
                            <div class="row mb-3 mx-5">
                                <label for="title">Title</label>

                                <div class="col-md">
                                    <input id="title" type="text"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        style="font-size: 30px; font-weight: bold;"
                                        value="{{ old('title') }}" required autocomplete="title"
                                        placeholder="Write your title..." autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- category --}}
                            <div class="row mb-3 mx-5">
                                <label for="category_id">Category</label>

                                <div class="col-md">
                                    <select name="category_id" id="category_id" class="form-select" required>
                                        <option selected>--- SELECT CATEGORY ---</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- tag --}}
                            <div class="row mb-3 mx-5">
                                <label for="tags">Tags</label>

                                <div class="col-md">
                                    <select
                                        class="form-select select2"
                                        style="width: 100% !important"
                                        name="tags[]" multiple="multiple" required>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- content --}}
                            <div class="row mb-3 mx-5">
                                <label for="content">Content</label>

                                <div class="col-md">
                                    <textarea class="form-control" placeholder="Write your content..." id="content" name="content"></textarea>

                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- button --}}
                    <div class="row mt-4 float-end">
                        <div class="col-md">
                            <form><input type="button" value="Cancel" onclick="history.back()" class="btn"
                                    style="width: 12rem; height:3rem; background-color: white; border-color:#4F6EAC; color:#4F6EAC">
                            </form>
                            <button type="submit" class="btn btn-primary"
                                style="width: 12rem; height:3rem; background-color: #4F6EAC; border-color:#4F6EAC">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('head')
    {{-- select2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script')
    {{-- select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".select2").select2({
                placeholder: "Select tags",
                tags: true,
            });
        });
    </script>

    {{-- ckeditor --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endpush
