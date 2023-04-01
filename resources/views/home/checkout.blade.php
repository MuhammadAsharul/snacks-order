@extends('home.layouts.app')
@section('title', 'Checkout')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Checkout<span>.</span></h2>
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
            <div class="row">
                <div class="col-lg-12">
                    <h3>Final to Place Your Order</h3>
                </div>
                <div class="col-lg-8">
                    <div class="order-table">
                        <p>Product Will Send At </p>
                        <div class="cart-item">
                            <span>Address</span>
                            <p>{{ $shipping_address->address }}</p>
                        </div>
                        <div class="cart-item">
                            <span>City</span>
                            <p class="product-name">{{ $shipping_address->city }}</p>
                        </div>
                        <div class="cart-item">
                            <span>Postal Code</span>
                            <p>{{ $shipping_address->postal_code }}</p>
                        </div>
                        <div class="cart-item">
                            <span>Phone Number</span>
                            <p>{{ $shipping_address->phone_number }}</p>
                        </div>
                        <div class="cart-item">
                            <span>Tanggal Pemesanan</span>
                            <p>{{ $shipping_address->tgl_pemesanan }}</p>
                        </div>
                        <div class="cart-item">
                            <span>Note</span>
                            <p>{{ $shipping_address->note }}</p>
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('placeorder') }}" method="POST">
                            @csrf
                            <input type="submit" value="Place Order" class="btn btn-primary mt-3">
                        </form>
                        {{-- <form action="" method="POST">
                            @csrf
                            <input type="submit" value="Cancel Order" class="btn btn-danger mt-3">
                        </form> --}}
                    </div>
                </div>
                <div class="col-lg-4 mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th class="product-h">Product Name</th>
                                <th>Price</th>
                                <th class="quan">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cart_items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="">{{ $item->products->name }}
                                    </td>
                                    <td class="price-col">@currency($item->price)</td>
                                    <td class="quantity-col">
                                        {{ $item->quantity }}
                                    </td>
                                </tr>
                                @php
                                    $total = $total + $item->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td class="total">Total</td>
                                <td class="total">@currency($total)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>


            </div>
            {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method">
                            <h3>Payment</h3>
                            <ul>
                                <li>Paypal <img src="img/paypal.jpg" alt=""></li>
                                <li>Credit / Debit card <img src="img/mastercard.jpg" alt=""></li>
                                <li>
                                    <label for="two">Pay when you get the package</label>
                                    <input type="radio" id="two">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}
        </div>
    </section>
    <!-- Cart Total Page End -->
@endsection
