<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Services\PostServices;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $categories = Category::all();
        $tags = Tag::all();
        // $users = User::all();
        $posts = Post::get();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'Dashboard',
            'posts' => $posts,
            'tags' => $tags,
        ]);
    }

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

        return view('posts.create', compact('categories', 'tags'))
            ->with('success-create-post', 'Post successfully created!');
    }

    public function store(PostRequest $request, PostServices $postServices)
    {
        $postServices->handleStore($request);

        return redirect()->route('home.index')
            ->with('success-create-post', 'Post successfully created!');
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
        return redirect()->route('posts.show', $post->slug)
            ->with('success-edit-post', 'Post successfully updated!');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
            'title' => 'Post.show',
            'active' => 'Post',
        ]);
    }

    public function destroy(Post $post, PostServices $postServices)
    {
        $this->authorize('owner', $post);

        $postServices->handleDestroy($post);

        return redirect()->route('home.index', auth()->user()->username);
    }

    public function bookmark(Post $post)
    {
        // boolean (left = false)
        // boolean (right = true)
        // $post->bookmark = !$post->bookmark;
        // $post->save();

        $post->update([
            'bookmark' => $post->bookmark ? false : true,
        ]);

        return back();
    }
}
