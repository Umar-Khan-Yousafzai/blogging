<?php
// app/Http/Controllers/CommentController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'blog_id' => $request->input('blog_id'),
            'user_id' => auth()->id(), // Assuming users are authenticated
        ]);

        return redirect()->back()->with('success', 'Comment added successfully');
    }
}
