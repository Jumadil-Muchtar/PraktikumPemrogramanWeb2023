<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Models\Mode;
// use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'role' => ['required', Rule::in(['buyer', 'seller'])],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $role = $request->input('role');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role,
        ]);

        $user->assignRole($role);

        // if ($role === 'buyer') {
        //     $buyerdata = [
        //         'user_id' => $user->id
        //     ];
        //     Buyer::create($buyerdata);
        // }

        // if ($role === 'seller') {
        //     $sellerdata = [
        //         'user_id' => $user->id
        //     ];
        //     Seller::create($sellerdata);
        // }

        event(new Registered($user));

        Auth::login($user);

        $redirectPath = $role === 'seller' ? RouteServiceProvider::DASHBOARD : RouteServiceProvider::HOME;

        return redirect()->intended($redirectPath);
    }
}
