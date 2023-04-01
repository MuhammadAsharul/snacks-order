@extends('admin.layouts.app')
@section('title', 'Edit Product Image')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Product</h4>
        <div class="row">
            <!-- Add product -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product Image</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateproductimg') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Previous Image</label>
                                <div class="col-sm-10">
                                    <img src="{{ asset($productimg->image) }}" alt="">
                                </div>
                            </div>
                            <input type="hidden" value="{{ $productimg->id }}" name="id">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="image">Upload New Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="formFile" name="image" />
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Image</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
