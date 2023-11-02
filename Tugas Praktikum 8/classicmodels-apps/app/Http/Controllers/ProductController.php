<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function showAllProduct()
    {
        return view('product', [
            "products" => Product::all()
        ]);
    }

    public function showByProductCode($productCode)
    {
        $product = Product::where('productCode', $productCode)->first();
        return view('products', ['product' => $product]);
    }


    public function showByProductLine($productLine)
    {
        $products = Product::where('productLine', $productLine)->get();
        return view('products-by-productline', [
            'products' => $products,
            'productLine' => $productLine,
        ]);
    }
}
