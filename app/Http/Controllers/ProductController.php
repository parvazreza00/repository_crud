<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function product(){
        $product = Product::paginate(5);
        return view('product.product',compact('product'));
    }

    public function add_product(Request $request){
        $request->validate(
        [
            'name' => 'required|unique:products',
            'price' => 'required',
        ],
        [
            'name.required' => 'Name field is required',
            'name.unique' => 'Name already Exists',
            'price.required' => 'price field is required',
        ]);

        // $product = new Product();
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->created_at = Carbon::now();
        // $product->save();
        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['created_at'] = Carbon::now();
        Product::insert($data);
        return response()->json([
            'status' => 'success',
        ]);

    }//end method-----------------------

    public function update_product(Request $request){
        $id = $request->id;

        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['updated_at'] = Carbon::now();
        Product::findOrFail($id)->update($data);
        return response()->json([
            'status' => 'success',
        ]);
    }//end method----------------------------

    public function delete_product(Request $request){
        $product_id = $request->product_id;
        Product::findOrFail($product_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }//end method-------------------------
    public function pagination(Request $request){
        $product = Product::paginate(5);
        return view('product.product_paginate',compact('product'))->render();
    }//end method-------------------------------

    public function search_product(Request $request){
        $search_string = $request->search_string;
        $product = Product::where('name','Like','%'.$search_string.'%')
                ->orWhere('price','Like','%'.$search_string.'%')
                ->orderBy('id','DESC')
                ->paginate(5);
        if($product->count() >= 1){
            return view('product.product_paginate',compact('product'))->render();
        }else{
            return response()->json([
                'status' => 'No Data Found',
            ]);
        }    
    }
}
