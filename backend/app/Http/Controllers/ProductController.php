<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller {
    protected $repository;

    public function __construct(ProductRepository $repository) {
        $this->repository = $repository;
    }

    public function index() {
        $products = $this->repository->getAll();

        return response()->json($products);
    }

    public function store(StoreProductRequest $request) {
        $product = $this->repository->store($request);

        return response()->json($product);
    }

    public function show($id) {
        $product = $this->repository->getById($id);

        return response()->json($product);
    }

    public function update(StoreProductRequest $request, $id) {
        $product = $this->repository->update($id, $request);

        return response()->json($product);
    }

    public function destroy($id) {
        $this->repository->destroyById($id);
    }
}
