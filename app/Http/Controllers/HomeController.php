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
        // $topSeller = OrderDetails::with('product')->orderBy('quantity', 'DESC')->paginate(4);
        $top = OrderDetails::with('product')->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->get();
        return view('home.home', compact('top'));
    }
}
