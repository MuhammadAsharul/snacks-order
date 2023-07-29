<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::where('name', '!=', 'Admin')->count();
        $product = Product::count();
        $order = Order::count();
        $pro = OrderDetails::with('product')
            ->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->first();
        $total = Order::sum('total_harga');
        $latest = Order::with('user', 'detail')
            ->where('status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->get();
        $top = OrderDetails::with('product')
            ->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->get();

        // total penjualan
        $data = OrderDetails::select([DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('SUM(quantity) as total'),])
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderByDesc('month')

            ->whereBetween('created_at', [Carbon::now()->subMonths(12), Carbon::now()])
            ->get();

        $chartData = [];
        foreach ($data as $item) {
            $chartData[] = [$item->year . '-' . $item->month, $item->total];
        }

        // total produk terbanyak dibeli
        $data = OrderDetails::with('product')
            ->select(['product_id', DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('SUM(quantity) as total_quantity')])
            ->groupBy('product_id', 'year', 'month')
            ->orderByDesc('total_quantity')
            ->take(10)
            ->whereBetween('created_at', [Carbon::now()->subMonths(12), Carbon::now()])
            ->get();

        $chartProduct = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pembelian',
                    'data' => [],
                    'backgroundColor' => ['#ffcd56', '#ff6384', '#36a2eb', '#fd6b19', '#b2ff59', '#ff00ff', '#00ff00', '#ffa500', '#4b0082', '#8fbc8f'],
                ],
            ],
        ];

        foreach ($data as $item) {
            $chartProduct['labels'][] = $item->product->name;
            $chartProduct['datasets'][0]['data'][] = $item->total_quantity;
        }

        return view('admin.dashboard', compact('chartProduct', 'chartData', 'product', 'user', 'order', 'total', 'pro', 'latest', 'top'));
    }
    private function getMonthName($month)
    {
        $monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return $monthNames[$month - 1];
    }
}
