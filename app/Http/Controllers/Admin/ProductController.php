<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.product', compact('product'));
    }
    public function AddProduct()
    {
        $category = Category::all();
        return view('admin.addproduct', compact('category'));
    }
    public function StoreProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products',
            'price' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $image = $request->file('image');
        $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $image_name);
        $image_url = 'upload/' . $image_name;

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'category_id' => $request->category_id,
            'image' => $image_url
        ]);

        return redirect()->route('adminproduct')->with('message', 'Product Added Successfully');
    }
    public function EditProductImg($id)
    {
        $productimg = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productimg'));
    }
    public function UpdateProductImg(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $id = $request->id;
        $image = $request->file('image');
        $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $request->image->move(public_path('upload'), $image_name);
        $image_url = 'upload/' . $image_name;
        Product::findOrFail($id)->update(['image' => $image_url]);
        return redirect()->route('adminproduct')->with('message', 'Product Image Updated Successfully');
    }

    public function EditProduct($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editproduct', compact('product'));
    }
    public function UpdateProduct(Request $request)
    {
        $product = $request->id;
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'short_description' => 'required',
        ]);
        Product::findOrFail($product)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
        ]);
        return redirect()->route('adminproduct')->with('message', 'Product Updated Successfully');
    }
    public function DeleteProduct($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('adminproduct')->with('message', 'Product Deleted Successfully');
    }
}
