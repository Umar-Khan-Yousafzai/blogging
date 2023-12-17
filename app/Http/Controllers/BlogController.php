<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $blogs = Blog::orderBy('created_at', 'DESC')->with('user')->get();
        } else {
            $blogs = Blog::orderBy('created_at', 'DESC')->where('user_id','=',auth()->user()->id)->with('user')->get();
        }
        return view('admin.content.blogs.list', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.content.blogs.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Blog::createBlog($request);
        return redirect()->route('blogs.list')->with('success', "Blog added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::all();
        return view('admin.content.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Blog::updateBlog($request);
        return redirect()->route('blogs.list')->with('success', "Blog updated successfully.");
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        unlink("images/blogs/" . $blog->image);
        // unlink("images/blogs/" . $blog->author_image);
        $blog->delete();
        return back()->with('success', "Blog Deleted.");
    }

    public function updateStatus(Request $request)
    {
        if (isset($request->id) && isset($request->status)) {
            $blog = Blog::find($request->id);
            if ($request->status) {
                $blog->status = 0;
            } else {
                $blog->status = 1;
            }
            $blog->save();
            if ($request->status)
                return back()->with('success', 'Blog save as draft.');
            else
                return back()->with('success', 'Blog is published successfully');
        }
        return back()->with('error', 'Something went wrong');
    }
}
