<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {

        $tags = Tag::all();

        return view('tags.index', [
            'title' => 'Tags',
            'active' => 'Tags',
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        return view('tags.create', [
            'title' => 'Tags',
            'active' => 'Tags',
        ]);
    }

    public function show()
    {

        return view('tags.show', [
            'title' => 'Tags',
            'active' => 'Tags',
            'tags' => Tag::get(),
        ]);
    }

    public function store(TagRequest $tagRequest)
    {
        Tag::create($tagRequest->validated());

        return redirect()->route('tags.show');
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

        return redirect()->route('tags.show');
    }

    public function destroy(Tag $tags)
    {
        $tags->delete();

        return redirect()->route('tags.show');
    }
}
