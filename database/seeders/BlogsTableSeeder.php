<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogsTableSeeder extends Seeder
{
    public function run()
    {
        // Get random category IDs
        $categoryIds = Category::pluck('id')->toArray();

        // Get random user IDs with the role 'author'
        $authorIds = User::where('role', 'author')->pluck('id')->toArray();

        // Create 10 blog records
        Blog::factory(10)->create([
            'category_id' => function () use ($categoryIds) {
                return array_rand(array_flip($categoryIds));
            },
            'user_id' => function () use ($authorIds) {
                return array_rand(array_flip($authorIds));
            },
        ]);
    }
}
