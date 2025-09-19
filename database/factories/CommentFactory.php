<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'author' => $this->faker->name(),
            'content' => $this->faker->sentence(),
            'post_id' => Post::factory(), // ensures valid post_id, or set manually
        ];
    }
}
