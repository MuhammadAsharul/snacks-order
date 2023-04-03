<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('name', '!=', 'Admin')->count();
        $product = Product::count();
        $order = Order::count();
        $category = Category::count();
        $trs = Order::all();
        return view('admin.dashboard', compact('product', 'user', 'order', 'trs', 'category'));
    }
}
