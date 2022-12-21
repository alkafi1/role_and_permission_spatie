@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header bg-success">
                <h3 class="text-white">Create Product</h3>
            </div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="product_name" id="name">
                        <div class="mt-2">
                            @error('product_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="form-label">Product Brand Name</label>
                        <input type="text" class="form-control" name="product_brand_name" id="name">
                        <div class="mt-2">
                            @error('product_brand_name')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="name" class="form-label">Product Description</label>
                        <input type="text" class="form-control" name="product_description" id="name">
                        <div class="mt-2">
                            @error('product_description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="image" class="form-label">Product Image</label>
                        <input type="file" class="form-control" name="product_image" id="image">
                        <div class="mt-2">
                            @error('product_image')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Create Product</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection