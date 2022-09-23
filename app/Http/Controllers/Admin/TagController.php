<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Category;
use App\Models\Like;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {

        $active = 'Tags';
        $categories = Category::all();
        $tags = Tag::paginate(5);
        $title = 'Tags';

        return view('tags.index', [
            'active' => $active,
            'categories' => $categories,
            'tags' => $tags,
            'title' => $title,
        ]);
    }

    public function create()
    {
        $active = 'Tags';
        $tags = Tag::all();
        $title = 'Tags';

        return view('tags.create', [
            'active' => $active,
            'title' => $title,
            'tags' => $tags,
        ]);
    }

    public function store(TagRequest $tagRequest)
    {
        Tag::create($tagRequest->validated());

        return redirect()->route('tags.index')->with('success', 'Successfuly Created New Tag!');
    }

    public function show(Tag $tag)
    {
        $active = 'Tags';
        $categories = Category::all();
        $posts = $tag->posts()->with('user', 'category', 'tags')->paginate(10);
        $title = 'Tags';

        return view('tags.show', [
            'active' => $active,
            'categories' => $categories,
            'posts' => $posts,
            'title' => $title,
            'tag' => $tag,
        ]);
    }


    public function edit(Tag $tag)
    {
        $active = 'Tags';
        $title = 'Edit Tag';
        return view('tags.edit', [
            'title' => $title,
            'active' => $active,
            'tag' => $tag,
        ]);
    }


    public function update(TagRequest $tagRequest, Tag $tag)
    {
        $tag->update($tagRequest->validated());

        return redirect()->route('tags.index')->with('success', 'Successfuly Updated!');
    }

    public function destroy(Tag $tag)
    {
        foreach ($tag->posts as $post) {
            $post->tags()->detach();
        }

        if (!$tag->posts()->count()) {
            $tag->delete();
        }

        return redirect()->route('tags.index')->with('success', 'Successfuly Deleted!');
    }
}
