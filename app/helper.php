<?php

use App\Models\Category;

function navbarCategories()
{
    $categories = Category::all();
    // $output = '';

    // foreach ($categories as $category) {
    //     // $output .= '<li><a href="' . route('category.page', ['categoryId' => $category->id]) . '">' . $category->name . '</a></li>';
    // }

    return $categories;
}
