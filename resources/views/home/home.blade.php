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
                        {{-- <ul class="product-controls">
                            <li data-filter="*">All</li>
                            <li data-filter=".dresses">Dresses</li>
                            <li data-filter=".bags">Bags</li>
                            <li data-filter=".shoes">Shoes</li>
                            <li data-filter=".accesories">Accesories</li>
                        </ul> --}}
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
                            {{-- <p>{{ $p->short_description }}</p> --}}
                            <div class="d-flex justify-content-between mb-3">
                                <a href="{{ route('singleproduct', [$p->id, $p->slug]) }}" class="btn btn-primary">See
                                    More</a>
                                <form action="{{ route('addproducttocart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $p->id }}">
                                    <input type="hidden" name="price" value="{{ $p->price }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <input class="btn btn-warning" type="submit" value="Buy Now">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
