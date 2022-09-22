<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like($post_id)
    {
        $user = auth()->user();
        $likePost = $user->likedPosts->where('post_id', $post_id)->count();

        if ($likePost == 0) {
            $user->likedPosts->attach($post_id);
            // return back();
        } else {
            $user->likedPosts->detach($post_id);
            // return back();
        }

        // $like = Like::create([
        //     'name' => auth()->user()->name.
        //     'comment' => $request->comment
        // ]);

        // return $like;
        return redirect()->back();
    }
}
