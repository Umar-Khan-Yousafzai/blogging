<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Newsletter;

class HomeController extends Controller
{
    public function home()
    {

        $blogs = Blog::paginate(5);
        return view('frontend.content.home', compact('blogs', ));
    }
    public function categoryPage(Request $request)
    {
        $key = strtolower($request->key);
        $category = Category::where('key', $key)->first();
        $blogs = Blog::where('category_id', $category->id)->paginate(5);


        return view('frontend.content.categories.category', compact('category','blogs'));
    }
    public function privacy()
    {
        return view('frontend.content.priavcy-policy');
    }
    public function aboutUs()
    {
        return view('frontend.content.about-us');
    }
    public function contactUs()
    {
        return view('frontend.content.contact');
    }

    public function storeContact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required',
        ]);

        $contact = Contact::create($validatedData);
        return redirect('/contact-us')->with('success', 'Message sent!');
    }

    public function getBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->with('user')->first();
        $oldBlog = Blog::where('created_at', '<', $blog->created_at)->orderBy('created_at', 'desc')->first();

        $blogs = Blog::where('id', '!=', $blog->id)->limit(5)->get();
        // return $blog;
        $blogTags = explode(',', $blog->tags);

        return view('frontend.content.blog-page', compact('blog', 'blogs', 'oldBlog', 'blogTags'));
    }

    public function postNewsLetter(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email|unique:newsletters,email|max:255'
        ]);

        $newsLetter = new Newsletter();
        $newsLetter->email = $validatedData['email'];
        $newsLetter->save();



        return back()->with('success', 'You have successfully subscribed to the newsletter!');
    }
}
