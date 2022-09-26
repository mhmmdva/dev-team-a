<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        // Tag::factory(10)->create();

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);

        Category::create([
            'name' => 'Web Developer',
            'slug' => 'web-developer',
        ]);

        Category::create([
            'name' => 'Data Analyst',
            'slug' => 'data-analyst',
        ]);

        Tag::create([
            'id' => 1,
            'name' => 'Likes',
            'slug' => 'likes',
        ]);

        Tag::create([
            'id' => 2,
            'name' => 'Home',
            'slug' => 'home',
        ]);

        Tag::create([
            'id' => 3,
            'name' => 'Indonesia',
            'slug' => 'indonesia',
        ]);


        Tag::create([
            'id' => 4,
            'name' => 'Websites',
            'slug' => 'websites',
        ]);

        Tag::create([
            'id' => 5,
            'name' => 'Admin',
            'slug' => 'admin',
        ]);

        Tag::create([
            'id' => 6,
            'name' => 'NEWS',
            'slug' => 'news',
        ]);

        Tag::create([
            'id' => 7,
            'name' => 'Blacks Mamba',
            'slug' => 'blacks-mamba',
        ]);

        Tag::create([
            'id' => 8,
            'name' => 'Newore',
            'slug' => 'newore',
        ]);

        Tag::create([
            'id' => 9,
            'name' => 'OnePiece_Red',
            'slug' => 'one-piece-red',
        ]);

        Tag::create([
            'id' => 10,
            'name' => 'allBlue',
            'slug' => 'all-blue',
        ]);

        Post::factory(20)->create()->each(function ($post) {
            $post->tags()->attach(mt_rand(2, 4));
        });

        $this->call([
            UserSeeder::class,
        ]);
    }
}
