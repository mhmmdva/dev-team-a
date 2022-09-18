<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function posts()
    {
        return $this->belongsToMany((Post::class));
    }

    public function users()
    {
        return $this->hasMany((User::class));
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    // public function posts()
    // {
    //     return $this->belongsToMany(Tag::class, 'post_tag', 'tag_id', 'post_id');
    // }
}
