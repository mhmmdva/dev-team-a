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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(5)->create();

        Category::create([
            'name' => 'Web Design',
        ]);

        Category::create([
            'name' => 'Web Developer',
        ]);

        Category::create([
            'name' => 'Data Analyst',
        ]);

        Tag::create([
            'id' => 1,
            'name' => 'kece'
        ]);

        Tag::create([
            'id' => 2,
            'name' => 'Home'
        ]);

        Tag::create([
            'id' => 3,
            'name' => 'Indonesia'
        ]);


        Tag::create([
            'id' => 4,
            'name' => 'Websites'
        ]);

        Post::factory(20)->create()->each(function ($post) {
            $post->tags()->attach(mt_rand(2, 4));
        });

        // $this->call([
        //     UserSeeder::class,
        // ]);
    }
}
