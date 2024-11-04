<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        $blog_count = Blog::count();
        return [
            'blog_id'       => rand(1, $blog_count),
            'name'          => $this->faker->name,
            'email'         => $this->faker->email,
            'website'       => $this->faker->url,
            'comment'       => $this->faker->realText(),
        ];
    }
}
