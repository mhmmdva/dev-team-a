<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function image()
    {
        if ($this->image != null) {
            return Storage::url($this->image);
        } else {
            return null;
        }

        //return Storage::url($this->image);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // protected static $marks = [
    //     Like::class,
    // ];

    public function bookmark()
    {
        return $this->belongsToMany(Bookmark::class);
    }
}
