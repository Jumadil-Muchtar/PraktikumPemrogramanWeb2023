<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showOrders()
    {
        return view("order", [
            "order" => Order::all(),
        ]);
    }
}
