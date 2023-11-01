<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class productController extends Controller
{
    function readAll(){
        $reads = DB::table('products')->get(); //compact untuk menyimpan data2 ke array
        return view('product', compact('reads'));
    }
    
    public function detailData($product) {
        $reads = DB::table('products')
        ->where('productCode','=',$product)
        ->get();
        if ($reads->isEmpty()) {
            $reads = DB::table('products')
            ->where('productLine','=',$product)
            ->get();
            return view('detailproductLines', compact('reads'));
        } else {
            return view('productDetails', compact('reads'));

        }
    }
    
}
