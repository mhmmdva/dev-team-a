<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['post_id', 'user_id'];

    // public function posts()
    // {
    //     return $this->belongsToMany(Bookmark::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(Bookmark::class);
    // }
}
