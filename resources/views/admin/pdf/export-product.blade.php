<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('dashboard/assets/img/favicon/logo.png') }}" />
    <title>Rekap</title>
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
            <h1 style="text-align: center;">Rekap Product</h1>

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
                    <thead class="">
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga Satuan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($pro as $so)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $so->product->name }}</td>
                                <td>{{ $so->product->price }}</td>
                                <td>{{ $so->quantity }}</td>
                            </tr>
                        @empty
                            <div class="mx-2 alert alert-danger">
                                Data Produk belum Tersedia.
                            </div>
                        @endforelse
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
