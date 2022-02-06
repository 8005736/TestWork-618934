<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $products = Product::get();

        return response()->json($products);
    }

    public function store(Request $request) {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return response()->json($product);
    }


    public function show($id) {
        $product = Product::find($id);

        return response()->json($product);
    }


    public function update(Request $request, $id) {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();

        return response()->json($product);
    }


    public function destroy($id) {
        $product = Product::find($id);

        $product->delete();
    }
}
