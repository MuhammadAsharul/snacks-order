@extends('admin.layouts.app')
@section('title', 'Order Transaction')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Rekap Penjualan</h4>
        <div class="card">
            <h5 class="card-header">Cetak Penjualan</h5>
            <div class="row">
                <div class="card-header">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <label for="tanggal-awal" class="col-md-2 col-form-label">Tanggal Awal</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="tglawal" id="tglawal"
                                    id="tanggal-awal" />
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label for="tanggal-akhir" class="col-md-2 col-form-label">Tanggal Akhir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" name="tglakhir" id="tglakhir"
                                    id="tanggal-akhir" />
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <a href=""
                                onclick="this.href='/cetak-order-bydate/'+document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value"
                                target="_blank" class="btn btn-primary col-md-12">Cetak <i class="fas fa-print"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
