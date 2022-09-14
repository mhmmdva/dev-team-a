<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = ['id', 'created_at', 'updated_at'];
=======
    protected $guarded = ['id'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
>>>>>>> 66039b3003ae80bc7b8f77f2712a3a67f9e3fe57
}
