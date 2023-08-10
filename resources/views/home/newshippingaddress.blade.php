@extends('home.layouts.app')
@section('title', 'New ShippingAddress')
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
        <div class="container mb-5 py-5">
            <form action="{{ route('newshippingaddress') }}" class="checkout-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>New Shipping Information</h3>
                    </div>
                    <div class="col-lg-12 mb-3 d-flex flex-row-reverse gap-2 ms-auto">
                        <a href="{{ route('editaddress', $shipping_address->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('deleteaddress', $shipping_address->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <p class="in-name">Phone*</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="phone_number" class="text-2xl">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <p class="in-name">City*</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="city">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <p class="in-name">Post Code*</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="postal_code">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            <p class="in-name">Address</p>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" name="address">
                        </div>
                    </div>
                    <input type="submit" value="Next" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
@endsection
