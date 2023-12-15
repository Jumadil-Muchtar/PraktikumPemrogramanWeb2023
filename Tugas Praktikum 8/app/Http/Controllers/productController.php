<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class productController extends Controller
{
    function SemuaProduct(){
        $data = DB::table('products')->get();
        return view('product', compact('data'));
        //compact itu punya si php membuat sebuah array dari variabel yg punya nilai 
    }
    
    function ProdukMotorcycles(){
        $data = DB::table('products')
        ->where('productline','=','Motorcycles')
        ->get(); 
        return view('productMotorcycles', compact('data'));
    }
    function ProdukClassicCars(){
        $data = DB::table('products')
        ->where('productline','=','Classic Cars')
        ->get();
        return view('productClassicCars', compact('data'));
    }
    function ProdukPlanes(){
        $data = DB::table('products')
        ->where('productline','=','Planes')
        ->get(); 
        return view('productPlanes', compact('data'));
    }
    function ProdukTrains(){
        $data = DB::table('products')
        ->where('productline','=','Trains')
        ->get(); 
        return view('productTrains', compact('data'));
    }
    function ProdukShips(){
        $data = DB::table('products')
        ->where('productline','=','Ships')
        ->get(); 
        return view('productShips', compact('data'));
    }
    function ProdukVintageCars(){
        $data = DB::table('products')
        ->where('productline','=','Vintage Cars')
        ->get(); 
        return view('productVintageCars', compact('data'));
    }
    function ProdukTrucksBuses(){
        $data = DB::table('products')
        ->where('productline','=','Trucks and Buses')
        ->get(); 
        return view('productTrucksBuses', compact('data'));
    }
    
    public function detailData($productCode) {
        $data = DB::table('products')
        ->where('productCode','=',$productCode)
        ->get();
        return view('detailProduct', compact('data'));
    }
    
}
