<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')
            ->select('productCode', 'productName', 'productLine', 'productVendor', 'quantityInStock')
            ->get();

        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = DB::table('products')->where('productCode', $id)->first();
        return view('products.show', compact('product'));
    }

    public function filterByProductLine(Request $request)
    {
    $productLine = $request->input('productLine');
    $products = DB::table('products')->where('productLine', $productLine)->get();
    
    return view('products.index', compact('products', 'productLine'));
    }
    
}
