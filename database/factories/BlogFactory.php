<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        $categoryIds = Category::pluck('id')->toArray();
        $userIds = User::pluck('id')->toArray();

        return [
            'category_id' => $this->faker->randomElement($categoryIds),
            'user_id' => $this->faker->randomElement($userIds),
            'title' => $this->faker->sentence,
            'title_description' => $this->faker->paragraph,
            'image' => "pexels-nataliya-vaitkevich-6941884.jpg",
            'content' => $this->faker->text,
            'main_tag_line' => $this->faker->word,
            'meta_title' => $this->faker->sentence,
            'meta_description' => $this->faker->paragraph,
            'meta_keywords' => $this->faker->words(3, true),
            'slug' => $this->faker->slug,
            'tags' => $this->faker->words(5, true),
            // Add other attributes as needed
        ];
    }
}
