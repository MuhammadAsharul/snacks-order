@extends('admin.layouts.app')
@section('title', 'Product')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Product</h4>
        <div class="card">
            <h5 class="card-header">Product Information</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($product as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->name }}</td>
                                <td>
                                    <img src="{{ asset($p->image) }}" alt="" height="100px">
                                    <br>
                                    <a href="{{ route('editproductimg', $p->id) }}" class="btn btn-warning mt-2">Update
                                        Image</a>
                                </td>
                                <td>{{ $p->price }}</td>
                                <td>
                                    <a href="{{ route('editproduct', $p->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deleteproduct', $p->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Product belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
