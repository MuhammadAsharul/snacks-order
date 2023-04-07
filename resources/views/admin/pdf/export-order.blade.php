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
    }

    .table1 tr th {
        background: black;
        color: #fff;
        font-weight: normal;
    }

    .table1,
    th,
    td {
        border: 1px solid #999;
        padding: 8px 20px;
    }
</style>

<body>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Product</h4>
        <div class="card">
            <h5 class="card-header">Product Information</h5>
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
                        @forelse ($data as $so)
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
                            </tr>
                        @empty
                            <div class="mx-2 alert alert-danger">
                                Data Category belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
