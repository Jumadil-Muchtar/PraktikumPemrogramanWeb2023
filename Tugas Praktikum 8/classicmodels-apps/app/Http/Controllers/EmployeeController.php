<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function showEmployees()
    {
        return view("employee", [
            "employee" => Employee::all(),
        ]);
    }
}
