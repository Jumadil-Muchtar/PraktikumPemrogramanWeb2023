<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orderdetail;

class OrderDetailController extends Controller
{
    public function showOrderDetails()
    {
        return view("orderDetail", [
            "orderdetail" => Orderdetail::all(),
            'title' => 'Orders Details'
        ]);
    }
}
