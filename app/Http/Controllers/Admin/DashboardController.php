<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('name', '!=', 'Admin')->count();
        $product = Product::count();
        $order = Order::count();
        $category = Category::count();
        // $trs = Order::all();
        $total = Order::sum('total_harga');
        $latest = Order::with('user', 'detail')->where('status', 'Paid')->orderBy('created_at', 'desc')->get();
        $top = OrderDetails::with('product')->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->get();
        return view('admin.dashboard', compact('product', 'user', 'order', 'total', 'category', 'latest', 'top'));
    }
}
