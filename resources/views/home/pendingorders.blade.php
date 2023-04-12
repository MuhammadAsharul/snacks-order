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
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Phone Number</th>
                        <th>Quantity</th>
                        <th>Address</th>
                        {{-- <th>Shipping</th>
            <th class="total-cart">Total Cart</th> --}}
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $total = 0;
                    @endphp --}}
                    @forelse ($order as $o)
                        @foreach ($o->detail as $detail)
                            <tr>
                                <td class="fw-light">{{ $o->id }}</td>
                                <td class="fw-light">{{ $detail->product->name }}</td>
                                <td class="fw-light">{{ $o->shipping_phonenumber }}</td>
                                <td class="fw-light">{{ $detail->quantity }} </td>
                                <td class="fw-light">{{ $o->shipping_address }} </td>
                            </tr>
                        @endforeach
                        {{-- @php
                            $total = $o->total_harga;
                        @endphp --}}
                        <tr>
                            <td></td>
                            <td class="total">Total</td>
                            <td class="total">@currency($o->total_harga)</td>
                            <td>
                                <button class="pay-button btn btn-primary" data-snap-token="{{ $o->snapToken }}"
                                    data-order-id="{{ $o->id }}">Pay now</button>
                            </td>
                        </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data Order belum Tersedia.
                        </div>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButtons = document.querySelectorAll('.pay-button');
        payButtons.forEach(function(payButton) {
            payButton.addEventListener('click', function() {
                // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                var snapToken = this.dataset.snapToken;
                window.snap.pay(snapToken, {
                    onSuccess: function(result) {
                        /* You may add your own implementation here */
                        // alert("payment success!");
                        window.location.href = '/invoice/' + this.dataset.orderId;
                        console.log(result);
                    },
                    onPending: function(result) {
                        /* You may add your own implementation here */
                        alert("waiting for your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        /* You may add your own implementation here */
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        /* You may add your own implementation here */
                        alert('you closed the popup without finishing the payment');
                    }
                })
            });
        });
    </script>
@endpush
