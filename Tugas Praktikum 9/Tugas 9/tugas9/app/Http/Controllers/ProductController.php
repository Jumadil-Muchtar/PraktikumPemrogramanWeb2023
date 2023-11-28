<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
        // Index
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Create
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    // Show
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Edit
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    // Delete
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

}
