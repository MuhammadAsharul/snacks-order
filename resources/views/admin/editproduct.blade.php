@extends('admin.layouts.app')
@section('title', 'Edit Product')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Product</h4>
        <div class="row">
            <!-- Edit product -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Product</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('updateproduct') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $product->name }}" />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="price">Price</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="price" name="price"
                                        value="{{ $product->price }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="short">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="short_description" id="editor" cols="125" rows="10">{{ $product->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="long">Long Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="long_description" id="" cols="125" rows="10">{{ $product->long_description }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
