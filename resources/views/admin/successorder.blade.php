@extends('admin.layouts.app')
@section('title', 'Order Transaction')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Success Order</h4>
        <div class="card">
            <h5 class="card-header">Order Success Information</h5>
            <div class="my-2 mx-3"><a class="btn btn-primary" href="{{ route('exportsuccess') }}">Export PDF</a></div>
            <div class="table-responsive text-nowrap">
                @if ($message = Session::get('message'))
                    <div class="mx-2 alert alert-success vw-100">
                        {{ $message }}
                    </div>
                @endif
                <table class="table box-border vw-50">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th> Buyer</th>
                            <th>Invoice</th>
                            <th>Product Buy</th>
                            <th>Created At</th>
                            <th>Status Pemesanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($success_orders as $so)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $so->user->name }}</td>
                                <td><span style="color:green">{{ $so->invoice }}</span></td>
                                <td>
                                    @foreach ($so->detail as $item)
                                        <li>{{ $item->product->name }} </li>
                                    @endforeach
                                </td>
                                <td>{{ $so->created_at->format('d-m-Y') }}</td>
                                <td>@currency($so->total_harga)</td>
                                <td>{{ $so->status_pemesanan }}</td>
                                <td>
                                    <a href="{{ route('editstatus', $so->id) }}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <div class="mx-2 alert alert-danger">
                                Data Status belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
