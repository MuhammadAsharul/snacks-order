@extends('admin.layouts.app')
@section('title', 'Order Transaction')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Success Order</h4>
        <div class="card">
            <h5 class="card-header">Order Success Information</h5>
            <div class="d-flex justify-content-between">
                {{-- <div class="my-2 mx-3 col-8"><a class="btn btn-primary" href="{{ route('exportsuccess') }}">Export PDF</a>
                </div> --}}
                <div class="d-flex align-items-center mx-3">
                    <div class="form-group">
                        {{-- <form action="{{ route('successorder') }}" method="get">
                            <div class="input-group mb-2">
                                <select name="date_filter" id="" class="form-select">
                                    <option value="">All Date</option>
                                    <option value="today">Today</option>
                                    <option value="this_week">This Week</option>
                                    <option value="last_week">Last Week</option>
                                    <option value="this_month">This Month</option>
                                    <option value="last_month">Last Month</option>
                                    <option value="this_year">This Year</option>
                                    <option value="last_year">Last Year</option>
                                </select>
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
                        </form> --}}
                        <form action="{{ route('filter') }}" method="get">
                            <div class="row my-3">
                                <div class="col-md-5">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" id="" class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label for="start_date">End Date</label>
                                    <input type="date" name="end_date" id="" class="form-control">
                                </div>
                                <div class="col-md-1 pt-4">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
                            <th>Total Buy</th>
                            <th>Status Pemesanan</th>
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
