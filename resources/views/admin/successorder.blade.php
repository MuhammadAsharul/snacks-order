@extends('admin.layouts.app')
@section('title', 'Order Transaction')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Success Order</h4>
        <div class="card">
            <h5 class="card-header">Order Success Information</h5>
            <div class="my-2 mx-2"><a class="btn btn-primary" href="/export-pdf">Export PDF</a></div>
            <div class="table-responsive text-nowrap">
                @if ($message = Session::get('message'))
                    <div class="mx-2 alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table class="table box-border vw-100">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>User Id</th>
                            <th>Invoice</th>
                            <th>Shipping Information</th>
                            <th>Product Id</th>
                            <th>Quantity</th>
                            <th>Total Paid</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($success_orders as $so)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $so->user->name }}</td>
                                <td>{{ $so->invoice }}</td>
                                <td>
                                    <ul>
                                        <li>{{ $so->shipping_address }}</li>
                                        <li>{{ $so->shipping_phonenumber }}</li>
                                        <li>{{ $so->shipping_city }}</li>
                                        <li>{{ $so->shipping_postalcode }}</li>
                                    </ul>
                                </td>
                                <td>{{ $so->product->name }}</td>
                                <td>{{ $so->quantity }}</td>
                                <td>{{ $so->status }}</td>
                                <td>@currency($po->total_harga)</td>
                            </tr>
                        @empty
                            <div class="mx-2 alert alert-danger">
                                Data Category belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
