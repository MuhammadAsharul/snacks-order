@extends('admin.layouts.app')
@section('title', 'Category')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Category</h4>
        <div class="card">
            <h5 class="card-header">Category Information</h5>
            <div class="table-responsive text-nowrap">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Category Name</th>
                            <th>Product</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($category as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->product_count }}</td>
                                <td>{{ $c->slug }}</td>
                                <td>
                                    <a href="{{ route('editcategory', $c->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletecategory', $c->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">
                                Data Category belum Tersedia.
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
