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
        <div class="container py-5 mb-5">
            <form action="{{ route('order') }}" class="checkout-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Fill in the correct order date</h3>
                    </div>
                    <div class="col-lg-9 -mt-10">
                        <div class="row">
                            <div class="col-lg-2">
                                <p class="in-name">Tanggal Pemesanan</p>
                            </div>
                            <div class="col-lg-10">
                                <input type="datetime-local" name="tgl_pemesanan">
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
