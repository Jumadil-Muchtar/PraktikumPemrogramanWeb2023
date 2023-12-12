<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
{
    public function showOffices()
    {
        return view("office", [
            "offices" => Office::all(),
            'title' => 'Offices'
        ]);
    }
}
