@extends('home.layouts.app')
@section('title', 'Product')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2 class="fw-bold">Single Product<span>.</span></h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <img src="img/add.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->
    <!-- Product Page Section Beign -->
    <section class="product-page mt-5">
        <div class="container flex">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-slider owl-carousel">
                        <div class="product-img">
                            <figure>
                                <img src="{{ asset($product->image) }}" alt="">
                            </figure>
                        </div>
                        {{-- <div class="product-img">
                            <figure>
                                <img src="{{ asset('home/img/product/product-1.jpg') }}" alt="">
                                <div class="p-status">new</div>
                            </figure>
                        </div> --}}
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="product-content">
                        <h2>{{ $product->name }}</h2>
                        <div class="pc-meta">
                            <h5>@currency($product->price)</h5>
                        </div>

                        <p style="text-align: justify">{{ $product->long_description }}</p> <br>
                        <p>{!! htmlspecialchars_decode($product->short_description) !!}</p>
                        <p><span class="fw-semibold">Snack Category :</span> {{ $product->category->name }}</p>
                        <form action="{{ route('addproducttocart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="product-quantity">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" min="1" placeholder="0">
                                </div>
                            </div>
                            <input class="primary-btn pc-btn" type="submit" value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Page Section End -->
@endsection
