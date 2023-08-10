@extends('home.layouts.app')
@section('title', 'Shipping Address')
@section('content')
    <!-- Page Add Section Begin -->
    <section class="page-add mb-2">
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
    <section class="cart-total-page spad mb-5">
        <div class="container mb-5 pt-3 ">
            <form action="{{ route('addshippingaddress') }}" class="checkout-form" method="POST">
                @csrf
                <div class="row ">
                    <div class="col-lg-12">
                        <h3>Provide Your Shipping Information</h3>
                    </div>
                    <div class="col-lg-12">
                        @if (count($shippingAddress) < 2)
                            <a href="{{ route('newshippingaddress') }}" class="btn btn-primary left-0 mb-3">Add New Shipping
                                Address</a>
                        @endif
                        {{-- <div class="col-lg-12 mb-3 d-flex flex-row-reverse gap-2 ms-auto">
                            <a href="{{ route('editaddress', $shipping_address->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deleteaddress', $shipping_address->id) }}" class="btn btn-danger">Delete</a>
                        </div> --}}
                        {{-- <div class="row">
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
                        </div> --}}
                        <div class="col-lg-12">
                            <p class="">Address</p>
                        </div>
                        <div class="row mt-3">
                            {{-- <div class="col-lg-1">
                            </div> --}}
                            <div class="col-lg-10">
                                @foreach ($shipping_address as $address)
                                    <div class="form-check w-full d-flex justify-content-between mb-3">
                                        <div>
                                            <input class="form-check-input" type="radio" name="exampleRadios"
                                                id="exampleRadios1" value="{{ $address->id }}">
                                            <label class="form-check-label w-full" for="exampleRadios1">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Phone: {{ $address->phone_number }}
                                                    </li>
                                                    <li class="list-group-item">City: {{ $address->city }}</li>
                                                    <li class="list-group-item">Postal code:
                                                        {{ $address->postal_code }}</li>
                                                    <li class="list-group-item">address: {{ $address->address }}</li>
                                                </ul>
                                            </label>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center gap-2">
                                            <a href="{{ route('editaddress', $address->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <a href="{{ route('deleteaddress', $address->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="form-check w-full d-flex justify-content-between">
                                    <div>
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="{{ $shipping_address->address }}">
                                        <label class="form-check-label w-full" for="exampleRadios1">
                                            <ul class="list-group">
                                                <li class="list-group-item">Phone: {{ $shipping_address->phone_number }}
                                                </li>
                                                <li class="list-group-item">City: {{ $shipping_address->city }}</li>
                                                <li class="list-group-item">Postal code:
                                                    {{ $shipping_address->postal_code }}</li>
                                                <li class="list-group-item">address: {{ $shipping_address->address }}</li>
                                            </ul>
                                        </label>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center gap-2">
                                        <a href="{{ route('editaddress', $shipping_address->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('deleteaddress', $shipping_address->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div> --}}
                            </div>

                        </div>
                        <input type="submit" value="Next" class="btn btn-primary mt-3 mb-5">
                    </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
@endsection

<script>
    // Output the $shipping_address data to JavaScript
    var shippingAddressData = @json($shipping_address);

    // Log the data using console.log()
    console.log(shippingAddressData);
</script>
