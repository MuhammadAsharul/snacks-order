<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function Index()
    {
        $category = Category::all();
        return view('admin.category', compact('category'));
    }
    public function AddCategory()
    {
        return view('admin.addcategory');
    }
    public function StoreCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        Category::create($category);
        return redirect()->route('category')->with('message', 'Category Added Successfully');
    }

    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.editcategory', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->category_id;
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);
        $category = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ];
        Category::findOrFail($category_id)->update($category);
        return redirect()->route('category')->with('message', 'Category Updated Successfully');
    }
    public function DeleteCategory($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('category')->with('message', 'Category Deleted Successfully');
    }
}
