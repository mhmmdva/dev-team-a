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
        $tags = Tag::paginate(10);
        $title = 'Tags';

        return view('tags.index', compact('active', 'categories', 'tags', 'title'));
    }

    public function create()
    {
        $active = 'Tags';
        $tags = Tag::all();
        $title = 'Tags';

        return view('tags.create', compact('active', 'tags', 'title'));
    }

    public function store(TagRequest $tagRequest)
    {
        $data = $tagRequest->validated();

        //$data['slug'] = str()->slug($data['name']);

        Tag::create($data);

        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        $active = 'Tags';
        $categories = Category::all();
        $posts = $tag->posts()->with('user', 'category', 'tags', 'likes')->paginate(10);
        $title = 'Tags';

        return view('tags.show', [
            'active' => $active,
            'categories' => $categories,
            'posts' => $posts,
            'title' => $title,
            'tag' => $tag,
        ]);
    }


    public function edit(Tag $tags)
    {

        return view('tags.edit', [
            'title' => 'Edit Tag',
            'tags' => $tags,
        ]);
    }


    public function update(TagRequest $tagRequest, Tag $tags)
    {
        $data = $tagRequest->validated();

        $tags->update($data);

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tags)
    {
        $tags->delete();

        return redirect()->route('tags.index');
    }
}
