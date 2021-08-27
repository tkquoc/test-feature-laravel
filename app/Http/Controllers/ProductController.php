<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // $products = ProductResource::collection($this->product->paginate(5));
        $products = ProductResource::collection($this->product->all());
        return view('products.index', compact('products'));
    }

    public function show(int $id) {
        $product = $this->product->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(ProductRequest $request) {
        $this->product->create($request->all());
        return redirect('/products');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product) {
        // request()->validate([]);

        $product->update([
            'name' => request('name'),
            'price' => request('price'),
            'desc' => request('desc'),
            'type' => request('type')
        ]);
        return redirect('/products');
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect('/products');
    }
}
