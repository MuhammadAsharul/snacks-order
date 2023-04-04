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
    <div class="cart-page vh-100 vw-50">
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
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th width="20%">Action</th>
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
                                <td class="price-col">@currency($item->products->price)</td>
                                <td class="quantity-col">
                                    {{ $item->quantity }}
                                </td>
                                <td><a href="{{ route('removeitem', $item->id) }}" class="btn btn-danger">x</a></td>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                        @endforeach
                        <tr class="mt-3">
                            @if ($total > 0)
                                <td class="total" colspan="4">Total</td>
                                <td class="total" colspan="4">@currency($total)</td>
                            @else
                                <td colspan="10">
                                    <div class="text-center alert alert-danger">
                                        Cart Empty.
                                    </div>
                                </td>
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
