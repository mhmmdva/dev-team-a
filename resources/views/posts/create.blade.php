@extends('layouts.app')

@section('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3" style="font-weight: 700;">Create Post</h1>
                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            {{-- image --}}
                            <div class="row mb-3 mx-5">
                                <label for="image">Image</label>

                                <div class="col-md">
                                    <input id="image" type="file"
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
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        <option value="0">--- SELECT CATEGORY ---</option>
                                        {{-- @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == old('categories')) selected @endif>{{ $category->name }}
                                            </option>
                                        @endforeach --}}
                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- tag --}}
                            <div class="row mb-3 mx-5">
                                <label for="tag_id">Tags</label>

                                <div class="col-md">
                                    <input name="tag_id" id="tag_id"class="form-control @error('tags') is-invalid @enderror" required>
                                </div>
                                @error('tag')
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
                {{-- </div> --}}
            </div>
        </div>
    @endsection

    {{-- CKEditor CDN --}}
    @section('script')
        <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#content'));
        </script>
    @endsection
