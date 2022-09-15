@extends('layouts.app')

@section('script')
    {{-- select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />

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
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3" style="font-weight: 700;">Edit Post</h1>
                <form method="POST" action="{{ route('posts.update', $post->slug) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="card">
                        <div class="card-body">

                            {{-- image --}}
                            <div class="row mb-3 mx-5">
                                <label for="image">Image</label>

                                <div class="col-md">
                                    <input id="image" type="file"
                                        class="form-control @error('image') is-invalid @enderror" name="image"
                                        value="{{ old('image') }}" autofocus>

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
                                        value="{{ old('title') ?? $post->title }}" required autocomplete="title"
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
                                            ($category->id == $post->category_id) ?
                                                <option value="{{ $category->id }}" selected="selected">{{ $category->name }}</option> :
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                    <select class="form-select select2" name="tags[]" multiple="multiple">
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                @foreach ($post->tags as $currentTag)
                                                    @if ($tag->id == $currentTag->id)
                                                        selected
                                                    @endif()
                                                @endforeach>{{ $tag->name }}
                                            </option>
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
                                    <textarea class="form-control" placeholder="Write your content..." id="content" name="content">
                                        {{ old('content') ?? $post->content }}
                                    </textarea>

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
                {{-- </div> --}}
            </div>
        </div>
    @endsection
