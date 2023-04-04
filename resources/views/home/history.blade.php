@extends('home.layouts.profile')
@section('title', 'User Profile')
@section('profilecontent')
    <div class="total-info">
        <div class="total-table">
            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($order as $o)
                        <tr>
                            <td class="fw-light">{{ $o->id }}</td>
                            <td class="fw-light">{{ $o->product->name }}</td>
                            <td class="fw-light">{{ $o->product->price }} </td>
                            <td class="fw-light">@currency($o->total_harga) </td>
                        </tr>
                        @php
                            $total = $total + $o->total_harga;
                        @endphp
                    @empty
                        <div class="alert alert-danger">
                            Data Product belum Tersedia.
                        </div>
                    @endforelse
                    {{-- <tr class="border border-primary">
                        <td class="total-cart" colspan="3">Total</td>
                        <td class="total-cart-p">@currency($total)</td>
                    </tr> --}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
