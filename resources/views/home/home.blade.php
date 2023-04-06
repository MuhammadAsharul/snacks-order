@extends('home.layouts.app')
@section('title', 'Products')
@section('content')
    @include('home.partials.banner')
    @include('home.partials.feature')

    <section class="latest-products spad">
        <div class="container">
            <div class="product-filter">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="product-list">
                @foreach ($products as $p)
                    <div class="col-lg-3 col-sm-6 mix all dresses bags">
                        <div class="single-product-item">
                            <figure>
                                <a href=""><img src="{{ $p->image }}" alt=""></a>
                            </figure>
                            <h6 class="fw-bold text-decoration-none">{{ $p->name }}</h6>
                            <p>@currency($p->price)</p>
                            <div class="d-grid gap-2 col-10 mx-auto mb-3">
                                <a href="{{ route('singleproduct', [$p->id, $p->slug]) }}" class="btn btn-primary ">See
                                    More</a>
                                <form action="{{ route('addproducttocart') }}" method="POST" class="text-center">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1">
                                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                                    <input type="hidden" name="price" value="{{ $p->price }}">
                                    <input class="btn btn-warning text-center mt-2 w-100" type="submit" value="Buy Now">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
