<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;


class PostServices
{
    public function handleStore($request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();
        $data['slug'] = str()->slug($data['title']);

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images/post');
            $data['image'] = $image;
        }

        $post = Post::create($data);

        foreach ($request->tags as $currentTag) {
            $param = [];
            if (Tag::find($currentTag) == null) {
                $param = ['name' => $currentTag];
            } else {
                $param = ['id' => $currentTag];
            }
            $tag = Tag::firstOrCreate($param);
            $post->tags()->attach($tag->id);
        }
    }

    public function handleUpdate($request, $post)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();
        $data['slug'] = str()->slug($data['title']);

        if ($request->hasFile('image')) {
            if (!is_null($post->image)) {
                Storage::delete($post->image);
            }
            $image = $request->file('image')->store('images/post');
            $data['image'] = $image;
        }

        $newTags = [];
        foreach ($request->tags as $currentTag) {
            $param = [];
            if (Tag::find($currentTag) == null) {
                $param = ['name' => $currentTag];
            } else {
                $param = ['id' => $currentTag];
            }
            $tag = Tag::firstOrCreate($param);
            array_push($newTags, $tag->id);
        }
        $post->tags()->sync($newTags);

        $post->update($data);
    }
}
