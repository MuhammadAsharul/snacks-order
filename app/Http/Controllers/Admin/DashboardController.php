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
        $pro = OrderDetails::with('product')->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')->first();
        $total = Order::sum('total_harga');
        $latest = Order::with('user', 'detail')->where('status', 'Paid')->orderBy('created_at', 'desc')->get();
        $top = OrderDetails::with('product')->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')
            ->get();

        // total penjualan
        $data = OrderDetails::select([
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(quantity) as total'),
        ])
            ->groupBy('date')
            ->orderBy('date')
            ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
            ->get();

        $chartData = [];
        foreach ($data as $item) {
            $chartData[] = [$item->date, $item->total];
        }

        // total produk terbanyak dibeli
        $data = OrderDetails::with('product')->select([
            DB::raw('product_id  as product_id'),
            DB::raw('SUM(quantity) as total_quantity')
        ])
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(10)
            ->get();

        $chartProduct = [
            'labels' => [],
            'datasets' => [
                [
                    'label' => 'Jumlah Pembelian',
                    'data' => [],
                    'backgroundColor' => [
                        '#ffcd56',
                        '#ff6384',
                        '#36a2eb',
                        '#fd6b19',
                        '#b2ff59',
                        '#ff00ff',
                        '#00ff00',
                        '#ffa500',
                        '#4b0082',
                        '#8fbc8f'
                    ]
                ]
            ]
        ];

        foreach ($data as $item) {
            $chartProduct['labels'][] = $item->product_id;
            $chartProduct['datasets'][0]['data'][] = $item->total_quantity;
        }

        return view('admin.dashboard', compact('chartProduct', 'chartData', 'product', 'user', 'order', 'total', 'pro', 'latest', 'top'));
    }
}
