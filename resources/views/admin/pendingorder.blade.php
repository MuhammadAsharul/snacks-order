@extends('admin.layouts.app')
@section('title', 'Order Transaction')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Pending Order</h4>
        <div class="card">
            <h5 class="card-header">Order Information</h5>
            <div class="table-responsive text-nowrap">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table class="table box-border vw-50">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Buyer</th>
                            <th>Invoice</th>
                            <th>Product Id</th>
                            <th>Total Paid</th>
                            <th>Status Pemesanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($pending_orders as $po)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $po->user->name }}</td>
                                <td>{{ $po->invoice }}</td>
                                <td>
                                    @foreach ($po->detail as $item)
                                        <li>{{ $item->product->name }} </li>
                                    @endforeach
                                </td>
                                <td>@currency($po->total_harga)</td>
                                <td>{{ $po->status_pemesanan }}</td>
                                <td>
                                    <a href="{{ route('editstatus', $po->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Category belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
