<?php

namespace App\Models;

class ProductRepository {
    public function getAll() {
        $products = Product::get();

        return $products;
    }

    public function store($request) {
        $product = new Product();
        $product->fill($request->all());
        $product->save();

        return $product;
    }

    public function update($id, $request) {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();

        return $product;
    }

    public function getById($id) {
        $product = Product::find($id);

        return $product;
    }

    public function destroyById($id) {
        $product = Product::find($id);

        $product->delete();
    }
}
