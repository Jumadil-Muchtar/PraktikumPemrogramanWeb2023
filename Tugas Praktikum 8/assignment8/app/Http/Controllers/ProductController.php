<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\console;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $title = "Product";
        
        return view('product', ['item' => $products, 'title' => $title, 'intro' => "Products of Classic Models"]);
    }
   
    // objek Request utk mengakses dan memanipulasi data permintaan HTTP yang diterima oleh aplikasi.
    public function search(Request $request){
        $title = "Product Line";
        // $request digunakan untuk mengambil input bernama productLine yang dikirimkan oleh pengguna 
        $productLine = $request->input('productLine');

        // mencocokkan productLine dri db dgn productline inputan, jika ada yg cocok taruh di variabel
        $products = Product::where('productLine', $productLine)->get();
        // dd($products->all());
        
        if ($products-> isempty()){
            $pesan="tidak ada data";
            echo "<script>alert('$pesan')</script>";
        }

        return view('productlines', ['product' => $products, 'title' => $title]);
    }

    public function showProduct($productName) {
        $title = "Product Line";
        // mencari productName yg sama dan ambil hasil pencarian pertama
        $products = Product::where('productName', $productName)->first();

        return view('show', ['product' => $products, 'title' => $title]);
    }

}
