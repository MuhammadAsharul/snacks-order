<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    // public function barChart()
    // {
    //     $users = User::select(DB::raw("COUNT(*) as count"))
    //         ->whereYear('created_at', date('Y'))
    //         ->groupBy(DB::raw("Month(created_at)"))
    //         ->pluck('count');

    //     $months = User::select(DB::raw("Month(created_at) as month"))
    //         ->whereYear('created_at', date('Y'))
    //         ->groupBy(DB::raw("Month(created_at)"))
    //         ->pluck('month');

    //     $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    //     foreach ($months as $index) {
    //         $datas = [$month] = $users[$index];
    //     }
    //     return view('admin.dashboard', compact('datas'));
    // }
}
