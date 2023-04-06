<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function Pending()
    {
        $pending_orders = Order::where('status', 'Unpaid')->latest()->get();
        return view('admin.pendingorder', compact('pending_orders'));
    }
    public function Success()
    {
        $success_orders = Order::where('status', 'Paid')->latest()->get();
        return view('admin.successorder', compact('success_orders'));
    }
    public function ExportSuccess()
    {
        $data = Order::where('status', 'Paid')->latest()->get();
        $pdf = Pdf::loadView('admin.pdf.export-order', ['data' => $data]);
        return $pdf->download('export-order' . Carbon::now()->timestamp . '.pdf');
    }
}
