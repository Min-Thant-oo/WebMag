<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\BlogStatus;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        $blog_status_count = BlogStatus::count();
        $category_count = Category::count();

        return [
            'thumbnail'             => null,
            'image'                 => null,
            'user_id'               => 1,
            'category_id'           => rand(1, $category_count),
            'title'                 => $this->faker->realText(25),
            'slug'                  => Str::slug($this->faker->realText(25)) . '-' . Str::random(5),
            'content'               => implode("\n\n", $this->faker->paragraphs(rand(2, 4))),
            'blog_status_id'        => rand(1, $blog_status_count),
            'published_at'          => $this->faker->dateTimeBetween('-1 month', 'now'),
            'is_featured'           => $this->faker->boolean(40),
        ];
    }
}


// Ut reprehenderit quos maiores ad illum est repudiandae quis. Corrupti quis eum dolor sed. Sapiente laboriosam ipsum aut totam ut aut dignissimos. In consequatur praesentium voluptatem quisquam totam beatae.

// Similique explicabo aut occaecati. Dignissimos id delectus aliquid fugit. Officia laudantium tempore ut autem placeat quia incidunt.

// Optio tempora sed exercitationem debitis pariatur. Quod quibusdam alias nihil. Tempore consequatur ipsa rerum natus. Officia consequatur reprehenderit eum repellat ipsa vitae.

// Ut ipsam perferendis ad cupiditate ratione nobis eum quis. Omnis aut et et sapiente molestias assumenda nostrum. Officia est deleniti inventore voluptatem. Consequatur unde quaerat assumenda ea libero omnis ut. Ut quod molestiae hic velit.