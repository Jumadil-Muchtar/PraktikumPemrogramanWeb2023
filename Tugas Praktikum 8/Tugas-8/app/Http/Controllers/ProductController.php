<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', [

            'products'  => $products,
        ]);
    }

    public function show($productCode)
    {
        $products = Product::where('productCode', $productCode)->get();
        if($products -> isEmpty()) {
            $products = Product::where('productLine', $productCode)->get();
            return view('product', compact('products'));
        } else {
            return view('details', compact('products'));
        }
    }
}
