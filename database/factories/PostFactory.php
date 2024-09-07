<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        return [
            // 
            'title' => fake()->sentence(10),
            'author_id' => User::factory(), //generate id sambil menjalankan factory user
            'category_id' => Category::factory(), //generate id sambil menjalankan factory user
            'slug' => Str::slug(fake()->sentence()), //sentece yg ditulis string dibudah jadi slug
            'body' => fake()->text(),
        ];
    }
}
