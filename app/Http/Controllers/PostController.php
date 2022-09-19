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
    public function index(Category $category, Tag $tag, User $user)
    {
        $categories = Category::all();
        $users = User::all();
        $post = Post::get();
        $posts = $tag->posts()->with('user', 'category', 'tags')->paginate(10);
        $tag = Tag::all();

        //dd($user);

        return view('home', [
            'active' => 'Dashboard',
            'category' => $category,
            'posts' => $posts,
            'user' => $user,
            'post' => $post,
            'title' => 'Dashboard',
            'tag' => $tag,
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
        ])->with('success-create-post', 'Post successfully created!');
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

        return view('posts.edit', [
            'active' => 'Post',
            'title' => 'Edit Post',
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    public function update(PostRequest $request, Post $post, PostServices $postServices)
    {

        $this->authorize('owner', $post);

        $postServices->handleUpdate($request, $post);

        return redirect()->route('post.show')
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
