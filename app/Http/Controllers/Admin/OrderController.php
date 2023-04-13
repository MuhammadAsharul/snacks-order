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
        $pending_orders = Order::where('status', 'Paid')->where('status_pemesanan', 'diproses')
            ->orWhere('status_pemesanan', 'dikirim')
            ->orWhere('status_pemesanan', 'menunggu')
            ->latest()->get();
        return view('admin.pendingorder', compact('pending_orders'));
    }
    public function Success()
    {
        $success_orders = Order::where('status_pemesanan', 'sampai')->latest()->get();
        return view('admin.successorder', compact('success_orders'));
    }
    public function EditStatus($id)
    {
        $editstatus = Order::findOrFail($id);
        return view('admin.editstatus', compact('editstatus'));
    }
    public function UpdateStatus(Request $request)
    {
        $order = $request->order_id;
        $request->validate([
            'status_pemesanan' => 'required',
        ]);
        $status = [
            'status_pemesanan' => $request->status_pemesanan,
        ];
        Order::findOrFail($order)->update($status);
        return redirect()->route('pendingorder')->with('message', 'Order Updated Successfully');
    }


    public function ExportSuccess()
    {
        $data = Order::where('status', 'Paid')->latest()->get();
        $pdf = Pdf::loadView('admin.pdf.export-order', ['data' => $data]);
        return $pdf->download('export-order' . Carbon::now()->timestamp . '.pdf');
    }
}
