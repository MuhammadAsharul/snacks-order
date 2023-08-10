@extends('home.layouts.app')
@section('title', 'Shipping Address')
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
        <div class="container mb-5 pt-3 ">
            <form action="{{ route('addshippingaddress') }}" class="checkout-form" method="POST">
                @csrf
                <div class="row ">
                    <div class="col-lg-12">
                        <h3>Provide Your Shipping Information</h3>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{ route('newshippingaddress') }}" class="btn btn-primary left-0 mb-3">Add New Shipping Address</a>
                        <div class="col-lg-12 mb-3 d-flex flex-row-reverse gap-2 ms-auto">
                            <a href="{{ route('editaddress', $shipping_address->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deleteaddress', $shipping_address->id) }}" class="btn btn-danger">Delete</a>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <p class="in-name">Phone*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="phone_number" class="text-2xl"
                                    value="{{ $shipping_address->phone_number }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <p class="in-name">City*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="city" value="{{ $shipping_address->city }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <p class="in-name">Post Code*</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="postal_code" value="{{ $shipping_address->postal_code }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-1">
                                <p class="in-name">Address</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="text" name="address" value="{{ $shipping_address->address }}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios1" value="option1">
                                <label class="form-check-label" for="exampleRadios1">
                                  alamat 1
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="exampleRadios" id="exampleRadios2" value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                  alamat 2
                                </label>
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
