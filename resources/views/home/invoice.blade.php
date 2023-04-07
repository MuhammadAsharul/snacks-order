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
    </style>
</head>

<body>
    <div class="container">
        <div class="header" style="margin-top: 20px; ">
            <h1 style="text-align: center;">Invoice</h1>
        </div>
        <div class="details">
            Karanggeneng, Boyolali<br>
            Boyolali, 57312<br>
            Phone: 085702363509<br>
            Email: snackbuning@gmail.com</p>
        </div>
        <table>
            {{-- @foreach ($data as $item) --}}
            <tr>
                <td>Invoice</td>
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
                            {{ $pr->quantity }}
                        </li>
                    @endforeach
                </td>
            </tr>

            {{-- @endforeach --}}
        </table>
        <div class="total">
            Total: @currency($data->total_harga)
        </div>
    </div>
</body>

</html>
