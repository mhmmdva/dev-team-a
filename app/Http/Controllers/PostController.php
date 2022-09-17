<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostServices;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create', [
            'title' => 'Post Create',
            'active' => 'Post',
            'categories' => $categories,
            'tags' => $tags,
        ]);

        return view('posts.create', compact('categories', 'tags'));
    }

    public function store(PostRequest $request, PostServices $postServices)
    {
        $postServices->handleStore($request);

        return redirect()->route('home.index');
    }

    public function edit(Post $post)
    {

        $this->authorize('owner', $post);
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.edit', compact('post', 'categories', 'tags'), [
            'title' => 'Post Create',
            'active' => 'Post',
        ]);
    }

    public function update(PostRequest $request, Post $post, PostServices $postServices)
    {

        $this->authorize('owner', $post);

        $postServices->handleUpdate($request, $post);

        return redirect()->route('home.index');
    }
}
