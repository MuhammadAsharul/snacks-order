<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Index()
    {
        $products = Product::paginate(4);
        return view('home.home', compact('products'));
    }
    public function TopBuy()
    {
        $top = OrderDetails::where('product')->max('quantity');
    }
}
