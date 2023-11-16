<?php

namespace App\Http\Controllers;

use App\Models\Dota;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Do_;

class DotaController extends Controller
{
    public function index() {
        $heroes = Dota::all();
        return view('index', compact('heroes'));
    }

    public function viewhero($id)
    {
        $heroes = Dota::where('id', $id)->get();
        if ($heroes->isEmpty()) {
            $heroes = Dota::where('id', $id)->get();
            return view('viewdetails', compact('heroes'));
        } else {
            return view('viewdetails', compact('heroes'));
        }
    }

    public function addhero()
    {
        return view("addhero");
    }

    public function inserthero(Request $request)
    {
        Dota::create($request->all());
        return redirect()->route("hero");
    }

    public function edithero($id)
    {
        $data = Dota::find($id);
        return view("edithero", compact("data"));
    }

    public function updatehero(Request $request, $id)
    {
        $data = Dota::find($id);
        $data->update($request->all());
        return redirect()->route("hero");
    }

    public function deletehero($id)
    {
        $data = Dota::find($id);
        $data->delete();
        return redirect()->route("hero");
    }
}
