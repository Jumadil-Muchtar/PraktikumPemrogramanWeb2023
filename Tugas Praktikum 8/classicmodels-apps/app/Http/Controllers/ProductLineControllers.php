<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productline;

class ProductLineControllers extends Controller
{
    public function showProductLine()
    {
        return view("productLine", [
            "productLine" => Productline::all(),
            'title' => 'Product Line'
        ]);
    }
}
