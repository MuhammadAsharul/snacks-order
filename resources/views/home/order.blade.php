@extends('home.layouts.app')
@section('title', 'Checkout')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Order<span>.</span></h2>
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
        <div class="container py-2 mb-2">
            @if (count($shipping_address) < 2)
                <a href="{{ route('newshippingaddress') }}" class="btn btn-primary left-0 mb-3">Add New Shipping
                    Address</a>
            @endif
            <form action="{{ route('ordersuccess') }}" class="checkout-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Fill in the correct order date</h3>
                    </div>
                    <div class="col-lg-12 -mt-10">
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Address</p>
                            </div>
                            <div class="col-lg-10">
                                @foreach ($shipping_address as $address)
                                    <div class="form-check w-full d-flex justify-content-between mb-3">
                                        <div>
                                            <input class="form-check-input" type="radio" name="id_address"
                                                id="id_address{{ $address->id }}" value="{{ $address->id }}">
                                            <label class="form-check-label w-full" for="id_address{{ $address->id }}">
                                                <div class="d-flex flex-column justify-content-start">
                                                    <p class="list-group-item">Phone: {{ $address->phone_number }}
                                                    </p>
                                                    <p class="list-group-item">City: {{ $address->city }}</p>
                                                    <p class="list-group-item">Postal code:
                                                        {{ $address->postal_code }}</p>
                                                    <p class="list-group-item">address: {{ $address->address }}</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="d-flex flex-column gap-2">
                                            <a href="{{ route('editaddress', $address->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('deleteaddress', $address->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Tanggal Pemesanan</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="datetime-local" name="tglpemesanan">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Note</p>
                            </div>
                            <div class="col-lg-10">
                                <textarea name="note" id="" cols="35" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="submit" value="Next" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
@endsection
