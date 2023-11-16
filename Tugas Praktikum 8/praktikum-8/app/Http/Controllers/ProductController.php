<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     #mengambil data dari product
     public function index()
     {
        $products = Product::all();
        return view('products', [
            'product' => $products,
            'products' => Product::paginate(40)->withQueryString()
        ]);
     }
 
     #mengambil data yg dmna saat kita mencari data akan menampilkan semua nama product yg sama
     public function search(Request $request)
     {
         $productLine = $request->input('productLine'); // Ambil nilai yang diinputkan pengguna
 
         $products = Product::where('productLine', $productLine)->get();
 
         return view('productlines', ['products' => $products]);
     }
 
     # info detail product berdasarkan yg dicari 
     public function showProduct($productName)
     {
         $product = Product::where('productName', $productName)->first();   //akan mengambil pencarian yg pertama yg muncul
 
         return view('product', ['product' => $product]);
     }
}
