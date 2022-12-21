@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-success">
                    <h3 class="text-white">View Product</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <thead>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Product Brand Name</th>
                                <th>Product Description</th>
                                <th>Product Image</th>
                                <th>Action</th>
                            </thead>
                        </tr>
                    @forelse ($products as $sl=>$product )
                        <tr>
                            <td>{{$sl+1}}</td>
                            <td>{{$product->product_name}}</td>
                            <td>{{$product->product_brand_name}}</td>
                            <td>{{$product->product_description}}</td>
                            <td>
                                <img width="200px" src="{{asset('uploads/products/'.$product->product_image)}}" alt="" >
                            </td>
                            <td>
                                @can('edit_products')
                                <a href="{{route('product.edit',$product->id)}}"> <button class="btn btn-info ">Edit</button></a>
                                @endcan
                                @can('delete_products')
                               <a href="{{route('product.delete',$product->id)}}"> <button class="btn btn-danger ">Delete</button></a>
                               @endcan
                            </td>
                        </tr>
                    @empty
                            <tr>
                                <td colspan="6" class="text-center text-bold">No Product Yet!!!</td>
                            </tr>
                    @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection