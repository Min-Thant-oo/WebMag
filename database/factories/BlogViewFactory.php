<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogView;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogViewFactory extends Factory
{
    protected $model = BlogView::class;

    public function definition(): array
    {
        $blog_count = Blog::count();
        return [
            'blog_id'   => rand(1, $blog_count),
            'ip'        => $this->faker->ipv4,
        ];
    }
}
