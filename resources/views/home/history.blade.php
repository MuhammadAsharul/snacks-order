@extends('home.layouts.profile')
@section('title', 'User Profile')
@section('profilecontent')
    <p>Success Orders</p>
    <div class="total-info">
        <div class="total-table">
            <table>
                <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Product</th>
                        <th>Status Pesanan</th>
                        <th>Total</th>
                        <th>Tanggal Pembelian</th>
                        <th>Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($order as $o)
                        <tr>
                            <td class="fw-light">{{ $o->invoice }}</td>
                            <td class="fw-light">
                                @foreach ($o->detail as $item)
                                    <li style="list-style: none;"> {{ $item->product->name }}</li>
                                @endforeach
                            </td>
                            <td>{{ $o->status_pemesanan }}</td>
                            {{-- <td class="fw-light">{{ $o->price }} </td> --}}
                            <td class="fw-light">@currency($o->total_harga) </td>
                            <td class="fw-light">{{ $o->created_at->format('d-m-Y') }} </td>
                            <td class="fw-light">
                                <a class="btn btn-primary" href="{{ route('invoice', $o->id) }}">PDF</a>
                            </td>
                        </tr>
                        @php
                            $total = $total + $o->total_harga;
                        @endphp
                    @empty
                        <div class="alert alert-danger">
                            Data Transaksi belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
