<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $blogs = Blog::where('title', 'like', '%' . $query . '%')->orwhere('tags','like','%'. $query . '%')->paginate(10);
        // return $blogs;
        return view('frontend.content.search', compact('blogs', 'query'));
    }
}
