<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<style>
    .table1 {
        font-family: sans-serif;
        color: #232323;
        border-collapse: collapse;
        width: 100%
    }

    .table1 tr th {
        background: black;
        color: #fff;
        font-weight: normal;
    }

    .details {
        margin-left: 30px;
    }

    li {
        list-style-type: none
    }

    .table1,
    th,
    td {
        border: 1px solid #999;
        padding: 8px 10px;
    }
</style>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="header" style="margin-top: 20px; ">
            <h1 style="text-align: center;">Rekap Penjualan</h1>
        </div>
        <div class="details">
            Karanggeneng, Boyolali<br>
            Boyolali, 57312<br>
            Phone: 085702363509<br>
            Email: snackbuning@gmail.com</p>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-bordered table1">
                    <thead class="table-light">
                        <tr>
                            <th>Invoice</th>
                            <th>Shipping Information</th>
                            <th>Product Buy</th>
                            <th>Total Paid</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @php
                            $total = 0;
                        @endphp
                        @forelse ($penj as $so)
                            <tr>
                                <td><span style="color:green">{{ $so->invoice }}</span></td>
                                <td>
                                    <ul>
                                        <li>{{ $so->shipping_address }}</li>
                                        <li>{{ $so->shipping_phonenumber }}</li>
                                        <li>{{ $so->shipping_city }}</li>
                                        <li>{{ $so->shipping_postalcode }}</li>
                                    </ul>
                                </td>
                                <td>
                                    @foreach ($so->detail as $item)
                                        <li>{{ $item->product->name }} </li>
                                    @endforeach
                                </td>
                                <td>@currency($so->total_harga)</td>
                                @php
                                    $total = $total + $so->total_harga;
                                @endphp
                            </tr>
                        @empty
                            <div class="mx-2 alert alert-danger">
                                Data Category belum Tersedia.
                            </div>
                        @endforelse
                        <tr>
                            <td colspan="2">Total</td>
                            <td colspan="2">@currency($total)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
