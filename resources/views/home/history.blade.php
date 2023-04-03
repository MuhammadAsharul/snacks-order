@extends('home.layouts.profile')
@section('title', 'User Profile')
@section('profilecontent')
    <div class="total-info">
        <div class="total-table">
            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        {{-- <th>Shipping</th>
                    <th class="total-cart">Total Cart</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($order as $o)
                        <tr>
                            <td class="fw-light">{{ $o->id }}</td>
                            <td class="fw-light">{{ $o->product->name }}</td>
                            <td class="fw-light">{{ $o->product->price }} </td>
                            <td class="fw-light">{{ $o->status }}</td>
                            <td class="fw-light">{{ $o->quantity }} </td>
                            {{-- <td class="fw-light">{{ $o->shipping_address }} </td> --}}
                            <td class="fw-light">@currency($o->total_harga) </td>
                            {{-- <td class="shipping">$10</td>
                    <td class="total-cart-p">$39</td> --}}
                        </tr>
                        @php
                            $total = $total + $o->total_harga;
                        @endphp

                    @empty
                        <div class="alert alert-danger">
                            Data Product belum Tersedia.
                        </div>
                    @endforelse
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="total-cart">Total</td>
                        <td class="total-cart-p">@currency($total)</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
