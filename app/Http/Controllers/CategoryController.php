<?php


namespace App\Http\Controllers;

use App\Exceptions\DuplicateCategoryException;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.content.categories.list', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.content.categories.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Category::createCategory($request->category_name, $request->category_key);
            return redirect()->route('categories.create')->with('success', "Category added successfully");
        } catch (DuplicateCategoryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.content.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::updateCategory($request);

        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::deleteCategory($id);
        return back()->with('success', "Category Deleted.");
    }

    /**
     * Updates the status of specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        if (isset($request->id)) {
            $category = Category::find($request->id);
            $category->status ^= 1;
            $category->save();

            if ($category->status == 0) {
                return back()->with('success', 'Category Deactivated.');
            } else {
                return back()->with('success', 'Category Published.');
            }
        }
        return back()->with('error', 'Something went wrong');
    }
}
