@extends('home.layouts.app')
@section('title', 'Category')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="page-breadcrumb">
                        <h2>Snack {{ $category->name }}<span>.</span></h2>
                        <a href="#">Category</a>
                        <a class="active" href="#">Snack {{ $category->name }}</a>
                    </div>
                </div>
                {{-- <div class="col-lg-8">
                    <img src="{{ asset('home/img/add.jpg') }}" alt="">
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->

    <!-- Categories Page Section Begin -->
    <section class="categories-page spad mt-5">
        <div class="container">
            <div class="categories-controls">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" method="get">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Search Product" name="keyword">
                                <button class="input-group-text btn btn-primary">Search</button>
                            </div>
                        </form>
                        {{-- <div class="categories-filter">
                            <div class="cf-left">
                                <form action="#">
                                    <select class="sort">
                                        <option value="">Sort by</option>
                                        <option value="">Orders</option>
                                        <option value="">Newest</option>
                                        <option value="">Price</option>
                                    </select>
                                </form>
                            </div>
                            <div class="cf-right">
                                <span>20 Products</span>
                                <a href="#">2</a>
                                <a href="#" class="active">4</a>
                                <a href="#">6</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="row">
                        @foreach ($product as $p)
                            <div class="col-lg-3 col-md-6">
                                <div class="single-product-item">
                                    <figure>
                                        <img src="{{ asset($p->image) }}" alt="">
                                    </figure>
                                    <h6 class="fw-bold text-decoration-none">{{ $p->name }}</h6>
                                    <p class="">@currency($p->price)</p>
                                    {{-- <p>{{ $p->short_description }}</p> --}}
                                    <div class="d-grid gap-2 col-10 mx-auto mb-3">
                                        <a href="{{ route('singleproduct', [$p->id, $p->slug]) }}"
                                            class="btn btn-primary">See More</a>
                                        <form action="{{ route('addproducttocart') }}" method="POST" class="text-center">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $p->id }}">
                                            <input type="hidden" name="price" value="{{ $p->price }}">
                                            <input type="number" name="quantity" value="1">
                                            <input class="btn btn-warning mt-2 w-100" type="submit" value="Buy Now">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-3.jpg') }}" alt="">
                                    <div class="p-status">new</div>
                                    <div class="hover-icon">
                                        <a href="{{ asset('home/img/products/img-3.jpg') }}" class="pop-up"><img
                                                src="{{ asset('home/img/icons/zoom-plus.png') }}" alt=""></a>
                                    </div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>One piece bodysuit</h6>
                                    </a>
                                    <p>$19.90</p>
                                </div>
                            </div>
                        </div> --}}
                            {{-- <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-6.jpg') }}" alt="">
                                    <div class="p-status sale">sale</div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>Yellow Maxi Dress</h6>
                                    </a>
                                    <p>$25.90</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-1.jpg') }}" alt="">
                                    <div class="hover-icon">
                                        <a href="{{ asset('home/img/products/img-1.jpg') }}" class="pop-up"><img
                                                src="{{ asset('home/img/icons/zoom-plus.png') }}" alt=""></a>
                                    </div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>One piece bodysuit</h6>
                                    </a>
                                    <p>$19.90</p>
                                </div>
                            </div>
                        </div> --}}
                        @endforeach
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6">
                    <div class="single-product-item">
                        <figure>
                            <img src="{{ asset('home/img/products/img-5.jpg') }}" alt="">
                            <div class="p-status">new</div>
                            <div class="hover-icon">
                                <a href="{{ asset('home/img/products/img-5.jpg') }}" class="pop-up"><img
                                        src="{{ asset('home/img/icons/zoom-plus.png') }}" alt=""></a>
                            </div>
                        </figure>
                        <div class="product-text">
                            <a href="#">
                                <h6>Green Dress with details</h6>
                            </a>
                            <p>$22.90</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product-item">
                        <figure>
                            <img src="{{ asset('home/img/products/img-4.jpg') }}" alt="">
                            <div class="p-status popular">popular</div>
                            <div class="hover-icon">
                                <a href="{{ asset('home/img/products/img-4.jpg') }}" class="pop-up"><img
                                        src="{{ asset('home/img/icons/zoom-plus.png ') }}" alt=""></a>
                            </div>
                        </figure>
                        <div class="product-text">
                            <a href="#">
                                <h6>Blue Dress with details</h6>
                            </a>
                            <p>$35.50</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product-item">
                        <figure>
                            <img src="{{ asset('home/img/products/img-8.jpg') }}" alt="">
                            <div class="p-status popular">popular</div>
                            <div class="hover-icon">
                                <a href="{{ asset('home/img/products/img-8.jpg') }}" class="pop-up"><img
                                        src="{{ asset('home/img/icons/zoom-plus.png ') }}" alt=""></a>
                            </div>
                        </figure>
                        <div class="product-text">
                            <a href="#">
                                <h6>Blue Dress with details</h6>
                            </a>
                            <p>$35.50</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-product-item">
                        <figure>
                            <img src="{{ asset('home/img/products/img-10.jpg') }}" alt="">
                            <div class="p-status popular">popular</div>
                            <div class="hover-icon">
                                <a href="{{ asset('home/img/products/img-10.jpg') }}" class="pop-up"><img
                                        src="{{ asset('home/img/icons/zoom-plus.png ') }}" alt=""></a>
                            </div>
                        </figure>
                        <div class="product-text">
                            <a href="#">
                                <h6>Blue Dress with details</h6>
                            </a>
                            <p>$35.50</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-11.jpg') }}" alt="">
                                    <div class="p-status sale">sale</div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>Yellow Maxi Dress</h6>
                                    </a>
                                    <p>$25.50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-12.jpg') }}" alt="">
                                    <div class="p-status">new</div>
                                    <div class="hover-icon">
                                        <a href="{{ asset('home/img/products/img-12.jpg') }}" class="pop-up"><img
                                                src="{{ asset('home/img/icons/zoom-plus.png') }}" alt=""></a>
                                    </div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>One piece bodysuit</h6>
                                    </a>
                                    <p>$19.90</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-14.jpg') }}" alt="">
                                    <div class="p-status sale">sale</div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>Yellow Maxi Dress</h6>
                                    </a>
                                    <p>$25.90</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-item">
                                <figure>
                                    <img src="{{ asset('home/img/products/img-15.jpg') }}" alt="">
                                    <div class="hover-icon">
                                        <a href="{{ asset('home/img/products/img-15.jpg') }}" class="pop-up"><img
                                                src="{{ asset('home/img/icons/zoom-plus.png') }}" alt=""></a>
                                    </div>
                                </figure>
                                <div class="product-text">
                                    <a href="#">
                                        <h6>One piece bodysuit</h6>
                                    </a>
                                    <p>$19.90</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-product-item">
                        <figure>
                            <img src="{{ asset('home/img/products/img-13.jpg') }}" alt="">
                            <div class="p-status">new</div>
                            <div class="hover-icon">
                                <a href="{{ asset('home/img/products/img-13.jpg') }}" class="pop-up"><img
                                        src="{{ asset('home/img/icons/zoom-plus.png') }}" alt=""></a>
                            </div>
                        </figure>
                        <div class="product-text">
                            <a href="#">
                                <h6>Green Dress with details</h6>
                            </a>
                            <p>$22.90</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="more-product">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
    <!-- Categories Page Section End -->
@endsection
