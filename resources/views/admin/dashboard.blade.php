@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Dashboard</h4>
        <div class="card">
            <h5 class="card-header">Dashboard Information</h5>
        </div>
        <div class="col-lg-12 col-md-12 order-1 mt-3">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Product Snack</span>
                            <h3 class="card-title mb-2">{{ $product }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('dashboard/assets/img/icons/unicons/wallet-info.png') }}"
                                        alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Category Snack</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $category }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 order-1 mt-3">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('dashboard/assets/img/icons/unicons/chart-success.png') }}"
                                        alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">User</span>
                            <h3 class="card-title mb-2">{{ $user }}</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('dashboard/assets/img/icons/unicons/wallet-info.png') }}"
                                        alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Order Total</span>
                            <h3 class="card-title  mb-2">@currency($total)</h3>
                            {{-- <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header  fw-bold">Latest Order</h5>
            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Buyer</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($latest as $o)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-light">{{ $o->invoice }}</td>
                                <td>{{ $o->user->name }}</td>
                                <td class="fw-light">
                                    @foreach ($o->detail as $item)
                                        <li style="list-style-type: none">{{ $item->product->name }} </li>
                                    @endforeach
                                </td>
                                <td class="fw-light">
                                    @foreach ($o->detail as $item)
                                        <li style="list-style-type: none">{{ $item->product->price }} X
                                            {{ $item->quantity }}</li>
                                    @endforeach
                                </td>
                                <td>@currency($o->total_harga)</td>
                                <td class="fw-light">{{ $o->created_at->format('d-m-Y') }} </td>
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
        <div class="card mt-3">
            <h5 class="card-header fw-bold">Product Top Seller</h5>
            <div class="table-responsive text-nowrap">

                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($top as $t)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $t->product->name }}</td>
                                <td>{{ $t->total_quantity }}</td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Produk Terbanyak belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
