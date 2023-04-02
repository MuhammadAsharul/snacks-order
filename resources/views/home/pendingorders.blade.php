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
                    @php
                        $total = 0;
                    @endphp

                    <tr>
                        <td class="fw-light">{{ $order->id }}</td>
                        <td class="fw-light">{{ $order->product->name }}</td>
                        <td class="fw-light">{{ $order->shipping_phonenumber }}</td>
                        <td class="fw-light">{{ $order->quantity }} </td>
                        <td class="fw-light">{{ $order->shipping_address }} </td>
                        {{-- <td class="fw-light">@currency($order->total_harga) </td> --}}
                        {{-- <td class="shipping">$10</td>
                        <td class="total-cart-p">$39</td> --}}
                    </tr>
                    @php
                        $total = $total + $order->total_harga;
                    @endphp
                    <tr>
                        <td></td>
                        <td class="total">Total</td>
                        <td class="total">@currency($total)</td>
                    </tr>
                </tbody>
            </table>
            <button id="pay-button">Buy Now</button>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
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
    </script>
@endpush
