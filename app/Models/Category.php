<?php

namespace App\Models;

use App\Exceptions\DuplicateCategoryException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'key',
        'status',
        'category'
    ];
    public static function createCategory(string $categoryName, string $key): Category
    {
        $categoryKey = strtolower(str_replace(' ', '-', $key));
        if (Category::where('key', $categoryKey)->exists()) {
            throw new DuplicateCategoryException("Category with key '$categoryKey' already exists");
        }

        $category = new Category();
        $category->category = $categoryName;
        $category->key = $categoryKey;
        $category->status = true;
        $category->save();

        return $category;
    }

    public static function updateCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_key' => 'required|string|max:255',
            // Add any additional validation rules as needed
        ]);

        $category = Category::find($request->id);
        $category->update([
            'category' => $request->category_name,
            'key' => $request->category_key,
            // Add any additional fields to update
        ]);

        return $category;
    }

    public static function deleteCategory(int $id)
    {
        $category = Category::find($id);

        $category->delete();
        return $category;
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
