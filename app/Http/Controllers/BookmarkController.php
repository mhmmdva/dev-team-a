<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
   public function bookmark($post_id)
   {
      $bookmark = Bookmark::where('post_id', $post_id)->where('user_id', auth()->user()->id)->first();

      if ($bookmark) {
         $bookmark->delete();
         return back();
      } else {
         Bookmark::create([
            'post_id' => $post_id,
            'user_id' => auth()->user()->id
         ]);
         return back();
      }
   }
}
