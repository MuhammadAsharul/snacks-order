@extends('admin.layouts.app')
@section('title', 'Edit Status Pemesanan')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Status Pemesanan</h4>
        <div class="row">
            <!-- Edit Status Pemesanan -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Status Pemesanan</h5>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('updatestatus') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $editstatus->id }}" name="order_id">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Status Pemesanan</label>
                                <div class="col-sm-10">
                                    <select name="status_pemesanan" id="defaultSelect" class="form-select">
                                        <option value="menunggu"
                                            {{ $editstatus->status_pemesanan == 'menunggu' ? 'selected' : '' }}>Menunggu
                                            Konfirmasi
                                        </option>
                                        <option value="diproses"
                                            {{ $editstatus->status_pemesanan == 'diproses' ? 'selected' : '' }}>Pesanan
                                            Diproses
                                        </option>
                                        <option value="dikirim"
                                            {{ $editstatus->status_pemesanan == 'dikirim' ? 'selected' : '' }}>
                                            Pesanan Dikirim</option>
                                        <option value="sampai"
                                            {{ $editstatus->status_pemesanan == 'sampai' ? 'selected' : '' }}>
                                            Sampai Tujuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
