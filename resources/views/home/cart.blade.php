@extends('home.layouts.app')
@section('title', 'Category')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add cart-page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Cart<span>.</span></h2>
                        <a href="#">Cart</a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Cart Page Section Begin -->
    <div class="cart-page">
        <div class="container">
            <div class="cart-table">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th class="product-h">Product</th>
                            <th>Price</th>
                            <th class="quan">Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_items as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset($item->products->image) }}" alt="" width="50">
                                </td>
                                <td class="">
                                    <h5>{{ $item->products->name }}</h5>
                                </td>
                                <td class="price-col">@currency($item->price)</td>
                                <td class="quantity-col">
                                    {{ $item->quantity }}
                                </td>
                                <td class="product-close"><a href="{{ route('removeitem', $item->id) }}"
                                        class="btn btn-danger">x</a></td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            @if ($total > 0)
                                <td class="total">Total</td>
                                <td></td>
                                <td class="total">@currency($total)</td>
                            @else
                                <td>
                                    <h4 style="text-align: center; font-weight: 600; color:red">Empty Cart Item</h4>
                                </td>
                                <td></td>
                                <td></td>
                            @endif
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-info">
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    @if ($total <= 0)
                                        <a href="#" class="btn btn-primary disabled" disabled>Proceed to
                                            checkout</a>
                                    @else
                                        <a href="{{ route('shippingaddress') }}" class="btn btn-primary">Proceed to
                                            Checkout</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page Section End -->
@endsection