<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if (Auth::id()){
            $role=Auth()->user()->role;

            if ($role=='pasien'){
                return view('dashboard');
            }
            else if ($role=='admin'){
                return view ('admin.adminhome');
            }
            else if ($role=='dokter'){
                return view ('dokter.dokterhome');
            }
            else if ($role=='apoteker'){
                return view ('pharmacist.pharmacisthome');
            }
            else{
                return redirect()->back()->with('error', 'Peran pengguna tidak dikenali.');
            }
        }
    }
}
