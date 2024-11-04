<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rows = [
            [
                'name' => 'Web Development',
                'slug' => Str::slug('Web Development'),
                'description' => 'This is web dev description.',
                'color' => 'A569BD',
            ],
            [
                'name' => 'PHP',
                'slug' => Str::slug('PHP'),
                'description' => 'This is PHP description.',
                'color' => '3498DB',
            ],
            [
                'name' => 'JavaScript',
                'slug' => Str::slug('JavaScript'),
                'description' => 'This is JS description.',
                'color' => 'F4D03F',
            ],
            [
                'name' => 'Laravel',
                'slug' => Str::slug('Laravel'),
                'description' => 'This is laravel description.',
                'color' => 'E74C3C',
            ],
        ];

        Category::insert($rows);
    }
}
