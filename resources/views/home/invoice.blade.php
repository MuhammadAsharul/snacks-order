<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            /* margin: 0 0 20px; */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header img {
            max-height: 100px;
        }

        .details {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .details label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .details p {
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th,
        table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f5f5f5;
            font-weight: bold;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
            text-align: right;
        }

        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #999;
        }

        .center {
            display: block;
            margin: auto;
            /* width: 50%; */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header" style="margin-top: 20px; text-align: center ">
            <img class="" src="dashboard/assets/img/favicon/logo.png" alt="">
            <h1>Invoice</h1>
            <hr>
        </div>
        <div class="details">
            Karanggeneng, Boyolali<br>
            Boyolali, 57312<br>
            Phone: 085702363509<br>
            Email: snackbuning@gmail.com</p>
        </div>
        <table>
            <tr>
                <td>No Invoice</td>
                <td>{{ $data->invoice }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>Product</td>
                <td>
                    @foreach ($data->detail as $pr)
                        <li style="list-style: none;">{{ $pr->product->name }}</li>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Shipping Information</td>
                <td>
                    <li style="list-style-type: none">{{ $data->shipping_address }}</li>
                    <li style="list-style-type: none">{{ $data->shipping_tglpemesanan }}</li>
                </td>
            </tr>
            <tr>
                <td>Price</td>
                <td>
                    @foreach ($data->detail as $pr)
                        <li style="list-style: none;">{{ $pr->product->price }} X
                            {{ $pr->quantity }} = {{ $pr->product->price * $pr->quantity }}
                        </li>
                    @endforeach
                </td>
            </tr>
            <tr>
                <td>Status Pesanan</td>
                <td>{{ $data->status_pemesanan }}</td>
            </tr>
        </table>
        <div class="total">
            @php
                $total_harga = 0;
                $total_harga += $pr->product->price * $pr->quantity;
            @endphp
            @foreach ($data->detail as $pr)
                {{ $pr->total_harga }}
            @endforeach
            Total: <span style="color: green">@currency($data->total_harga)</span>
        </div>
    </div>
    <div class="" style="text-align: right">
        <h4>Tertanda Tangan</h4>
        <img src="dashboard/assets/img/ttd.png" alt="" width="10%">
        <br>
        <h4>Bu Ning </h4>
    </div>
</body>

</html>
