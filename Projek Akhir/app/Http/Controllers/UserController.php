<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function adduser()
    {
        return view('admin.adduser');
    }

    public function storeuser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
            'role' => 'required|in:buyer,seller',
        ]);

        // Menambah user baru ke dalam database
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        $user->assignRole($request->input('role'));

        // Redirect kembali ke halaman UsersDashboard dengan pesan sukses
        return redirect('adminusers')->with('success', 'User berhasil ditambahkan');
    }

    public function edituser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edituser', compact('user'));
    }

    public function updateuser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:buyer,seller',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role'); // Update the role
        $user->save();

        // Assuming you have a method like assignRole in your User model
        // If you don't have this method, you can remove the following line
        $user->assignRole($request->input('role'));

        // Redirect back to the Users Dashboard page with a success message
        return redirect('adminusers')->with('success', 'User successfully updated');
    }
    public function deleteuser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect('adminusers')->with('success', 'User berhasil dihapus');
    }
}
