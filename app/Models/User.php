<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function tags()
    {
        return $this->hasMany(Post::class);
    }

    public function category()
    {
        return $this->hasMany(Post::class);
    }



    public function photo()
    {
        if ($this->photo != null) {
            return Storage::url($this->photo);
        } else {
            return asset('assets/users/images/default-profile-photo.jpg');
        }
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class, 'bookmarks', 'user_id', 'post_id');
    }
}
