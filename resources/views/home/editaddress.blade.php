@extends('home.layouts.app')
@section('title', 'Edit Address')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-breadcrumb">
                        <h2>User Shipping Detail<span>.</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->
    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container mb-5 py-5 ">
            <form action="{{ route('updateaddress') }}" class="checkout-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Edit Your Shipping Information</h3>
                    </div>
                    <div class="col-lg-9 ">
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Phone Number*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="phone_number" class="text-2xl"
                                    value="{{ $address->phone_number }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">City*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="city" value="{{ $address->city }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Post Code/ZIP*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="postal_code" value="{{ $address->postal_code }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Address</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="address" value="{{ $address->address }}">
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Next" class="btn btn-primary mt-3 mb-3">
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
@endsection
