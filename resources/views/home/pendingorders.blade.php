@extends('home.layouts.profile')
@section('title', 'Pending Orders')
@section('profilecontent')
    <p>Pending Orders</p>
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <div class="total-info">
        <div class="total-table">
            <table>
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Price</th>
                        {{-- <th>Shipping</th>
                        <th class="total-cart">Total Cart</th> --}}
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($pending_orders as $order)
                            <td class="total">{{ $order->product_id }}</td>
                            <td class="total">@currency($order->total_harga) </td>
                            {{-- <td class="shipping">$10</td>
                        <td class="total-cart-p">$39</td> --}}
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
