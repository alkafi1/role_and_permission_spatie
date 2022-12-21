<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function create_product()
    {
        return view('product.create_product');
    }
    //Product Store
    function product_store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|unique:products',
            'product_brand_name' => 'required',
            'product_description' => 'required',
            'product_image' => 'required',
        ]);
        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'product_brand_name' => $request->product_brand_name,
            'product_description' => $request->product_description,
            // 'product_image' => $request->product_image,
        ]);
        $product_img = $request->product_image;
        $extension = $product_img->getClientOriginalExtension();
        $product_img_name = $product_id.'-'.'.'.$extension;
        Image::make($product_img)->save(public_path('/uploads/products/'.$product_img_name))->resize(500,500);
        Product::find($product_id)->update([
            'product_image' => $product_img_name,
        ]);
        return back()->with('success', 'Product Create Successfully.');
        //return $request->all();
    }
    //view product
    function view_product()
    {
        $products = Product::all();
        return view('product.view_product',[
            'products' => $products,
        ]);
    }

    //delete product
    function product_delete($product_id)
    {
        $product_info = Product::find($product_id);
        $image_path = public_path('/uploads/products/'.$product_info->product_image);
        unlink($image_path);
        Product::find($product_id)->delete();
        return back()->with('success', 'Product Delete Successfully.');
    }
    //edit page show
    function product_edit($product_id)
    {
        $product_info = Product::find($product_id);
        return view('product.edit_product',[
            'product_info' => $product_info,
        ]);
    }

    //update product here
    function product_update(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required',
            'product_brand_name' => 'required',
            'product_description' => 'required',
        ]);
        if($request->product_image != ""){
            $product_info = Product::find($request->product_id);
            $image_path = public_path('/uploads/products/'.$product_info->product_image);
            unlink($image_path);
            $product_img = $request->product_image;
            $extension = $product_img->getClientOriginalExtension();
            $product_img_name = $request->product_id.'-'.'.'.$extension;
            Image::make($product_img)->save(public_path('/uploads/products/'.$product_img_name))->resize(500,500);
            Product::find($request->product_id)->update([
                'product_name' => $request->product_name,
                'product_brand_name' => $request->product_brand_name,
                'product_description' => $request->product_description,
                'product_image' => $product_img_name,
            ]);
            return back()->with('success', 'Product Create Successfully.');
        }
        else{
            Product::find($request->product_id)->update([
                'product_name' => $request->product_name,
                'product_brand_name' => $request->product_brand_name,
                'product_description' => $request->product_description,
            ]);
            return back()->with('success', 'Product Updated Successfully.');
        }
        return $request->all();
    }
}
