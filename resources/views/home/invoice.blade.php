@extends('home.layouts.app')
@section('title', 'Checkout')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Invoice<span>.</span></h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->
    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container">
            <div class="total-info">
                <div class="total-table">
                    <table>
                        <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>Address</th>
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

                            <tr>
                                <td class="fw-light">{{ $order->id }}</td>
                                <td class="fw-light">{{ $order->product->name }}</td>
                                <td class="fw-light">{{ $order->shipping_address }} </td>
                                <td class="fw-light">{{ $order->product->price }} </td>
                                <td class="fw-light">{{ $order->status }}</td>
                                <td class="fw-light">{{ $order->quantity }} </td>
                                <td class="fw-light">@currency($order->total_harga) </td>
                                {{-- <td class="shipping">$10</td>
                            <td class="total-cart-p">$39</td> --}}
                            </tr>
                            @php
                                $total = $total + $order->total_harga;
                            @endphp
                            <tr>
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
        </div>
    </section>
    <!-- Cart Total Page End -->
@endsection
