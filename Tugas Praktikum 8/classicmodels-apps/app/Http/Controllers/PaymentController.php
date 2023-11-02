<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function showPayments()
    {
        return view("payment", [
            "payment" => Payment::all(),
        ]);
    }
}
