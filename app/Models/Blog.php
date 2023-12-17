<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function olderBlog()
    {
        return Blog::where('created_at', '<', $this->created_at)
            ->orderBy('created_at', 'desc')
            ->firstOrFail();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function createBlog(Request $request): Blog
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:100',
            'category' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'slug' => 'required',
            // 'feed' => 'required|in:1,2,3',
        ]);
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/blogs/'), $imageName);

        if (!isset($request->tags)) {
            $request->tags = 'Uncategorized';
        }
        $lowered = strtolower($request->slug);
        $trimmedSlug = rtrim($lowered);
        $cleanSlug = str_replace(' ', '-', $trimmedSlug);
        $store = self::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'title_description' => $request->title_description,
            'image' => $imageName,
            'content' => $request->content,
            'main_tag_line' => $request->main_tag_line,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'category_id' => $request->category,
            'slug' => $cleanSlug,
            // 'feed' => $request->feed,
            'tags' => $request->tags
        ]);

        return $store;
    }


    public static function updateBlog(Request $request): Blog
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required|min:100',
            'category' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
            'slug' => 'required',
        ]);
        $blog = Blog::find($request->id);
        if ($request->file('image')) {
            unlink("images/blogs/" . $blog->image);
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images/blogs/'), $imageName);
        } else {
            $imageName = $blog->image;
        }

        if ($request->file('author_image')) {
            unlink("images/blogs/" . $blog->author_image);
            $author_image = time() . '1' . '.' . $request->author_image->getClientOriginalExtension();
            $request->author_image->move(public_path('images/blogs/'), $author_image);
        } else {
            $author_image = $blog->author_image;
        }
        if (!isset($request->tags)) {
            $request->tags = 'Uncategorized';
        }
        $blog->title = $request->title;
        $blog->title_description = $request->title_description;
        $blog->image = $imageName;
        $blog->content = $request->content;
        $blog->main_tag_line = $request->main_tag_line;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->slug = $request->slug;
        $blog->category_id = $request->category;
        // $blog->feed = $request->feed;
        $blog->tags = $request->tags;
        $blog->save();

        return $blog;
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
