@extends('home.layouts.profile')
@section('title', 'User Profile')
@section('profilecontent')
    <div class="total-info">
        <div class="total-table">
            <table>
                <thead>
                    <tr>
                        {{-- <th>Order Id</th> --}}
                        <th>Invoice</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @forelse ($order as $o)
                        <tr>
                            {{-- <td class="fw-light">{{ $o->id }}</td> --}}
                            <td class="fw-light">{{ $o->invoice }}</td>
                            <td class="fw-light">{{ Auth::user()->name }}</td>
                            <td class="fw-light">
                                @foreach ($o->detail as $item)
                                    {{ $item->product->name }}
                                @endforeach
                            </td>
                            {{-- <td class="fw-light">{{ $o->price }} </td> --}}
                            <td class="fw-light">@currency($o->total_harga) </td>
                            <td class="fw-light">Cetak PDF</td>
                        </tr>
                        @php
                            $total = $total + $o->total_harga;
                        @endphp
                    @empty
                        <div class="alert alert-danger">
                            Data Product belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
