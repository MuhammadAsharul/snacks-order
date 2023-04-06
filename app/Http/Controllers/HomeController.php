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
        // $topBuy = OrderDetails::with('product')->orderBy('quantity')->get();
        return view('home.home', compact('products'));
        // return view('home.home', compact('topBuy'));
    }
}
