<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
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
    public function Success(Request $request)
    {
        $query = Order::query()->where('status_pemesanan', 'sampai');
        $dateFilter = $request->date_filter;

        switch ($dateFilter) {
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'yesterday':
                $query->wheredate('created_at', Carbon::yesterday());
                break;
            case 'this_week':
                $query->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                break;
            case 'last_week':
                $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()]);
                break;
            case 'this_month':
                $query->whereMonth('created_at', Carbon::now()->month);
                break;
            case 'last_month':
                $query->whereMonth('created_at', Carbon::now()->subMonth()->month);
                break;
            case 'this_year':
                $query->whereYear('created_at', Carbon::now()->year);
                break;
            case 'last_year':
                $query->whereYear('created_at', Carbon::now()->subYear()->year);
                break;
        }
        $success_orders = $query->get();
        session()->put('success_orders', $success_orders);
        // $success_orders = Order::where('status_pemesanan', 'sampai')->latest()->get();
        return view('admin.successorder', compact('success_orders', 'dateFilter'));
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


    // public function ExportSuccess()
    // {
    //     // $data = Order::where('status', 'Paid')->where('status_pemesanan', 'sampai')->latest()->get();
    //     $success_orders = session()->get('success_orders');
    //     dd($success_orders);
    //     $pdf = Pdf::loadView('admin.pdf.export-order', ['success_orders' => $success_orders]);
    //     return $pdf->download('export-order' . Carbon::now()->timestamp . '.pdf');
    // }
    public function cetakForm()
    {
        return view('admin.cetak-penjualan-form');
    }
    public function cetakOrderPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : " . $tglawal, ' Tanggal Akhir : ' . $tglakhir]);
        $penj = Order::where('status_pemesanan', 'sampai')->whereBetween('created_at', [$tglawal, $tglakhir])->get();
        return view('admin.pdf.export-order', compact('penj'));
    }

    public function cetakProduct()
    {
        return view('admin.cetak-product-form');
    }
    public function cetakProductPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : " . $tglawal, ' Tanggal Akhir : ' . $tglakhir]);
        $pro = OrderDetails::with('product')->groupBy('product_id')
            ->selectRaw('product_id, SUM(quantity) as total_quantity')
            ->orderByDesc('total_quantity')->whereBetween('created_at', [$tglawal, $tglakhir])->get();
        return view('admin.pdf.export-product', compact('pro'));
    }
}
