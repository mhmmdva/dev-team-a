<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3, 4)),
            'slug' => $this->faker->slug(3),
            //'excerpt' => $this->faker->paragraph(mt_rand(2, 10)),
            //'body' => '<p>' . implode($this->faker->paragraphs(mt_rand(5, 10)) ) . '</p>',
            'content' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 3),
        ];
    }
}
