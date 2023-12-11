<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
        
    }
    public function index2()
    {
        $users = User::all();
        return view('profile', compact('users'));
        
    }

    public function count()
    {
        $userCount = User::count();
        $courseCount = Course::count();
        $contentCount = Content::count();
    
        return view('admin-dashboard', compact('userCount', 'courseCount', 'contentCount'));
    }
    
    public function count2()
    {
        $courseCount = Course::count();
        $contentCount = Content::count();
    
        return view('user-dashboard', compact('courseCount', 'contentCount'));
    }

    public function create()
    {
        $user = new User();
        return view('users.create', compact('user'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> role = $request -> role;
        $user -> Umur = $request -> Umur;
        $user -> Tempat_Lahir = $request -> Tempat_Lahir;
        $user -> Tempat_Tinggal = $request -> Tempat_Tinggal;
        $user -> save();

        return redirect()->to('users')->with('success', 'User berhasil disimpan');
    }
    public function edit($id)
    {
        $user = User::find($id);

        if(!$user){
            abort(404);
        }
        return view('users.edit', compact('user'));

    }

    public function update(Request $request, $id) 
    {
        $user = User::find($id);
        $user ->update($request->all());
        return redirect()->to('users')->with('success', 'Update user berhasil');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->to('users')->with('success', 'Delete user berhasil');
    }
}
