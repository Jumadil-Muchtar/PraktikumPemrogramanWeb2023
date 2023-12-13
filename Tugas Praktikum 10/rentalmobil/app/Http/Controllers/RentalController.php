<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Car;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    public function index()
    {
        $userRentals = Rental::with('car', 'driver')->where('user_id', Auth::id())->get();
        $cars = Car::all();
        $availableCars = Car::where('status', 'available')->get();
        $driver = Driver::all();
        $availableDrivers = Driver::where('status', 'available')->get();

        return view('rentals.index', compact('userRentals', 'cars', 'availableDrivers', 'availableCars'));
    }
    public function index1()
    {
        $userRentals = Rental::with('car', 'driver')->where('user_id', Auth::id())->get();
        $cars = Car::all();
        $availableCars = Car::where('status', 'available')->get();
        $driver = Driver::all();
        $availableDrivers = Driver::where('status', 'available')->get();

        return view('penyewa.rentals.index', compact('userRentals', 'cars', 'availableDrivers', 'availableCars'));
    }

    public function create()
    {
        $availableCars = Car::where('available', true)->get();
        $availableDrivers = Driver::where('available', true)->get();
    
        return view('rentals.create', compact('availableCars', 'availableDrivers'));
    }

    public function create1()
    {
        $availableCars = Car::where('status', 'available')->get();        
        $availableDrivers = Driver::where('status','available')->get();
    
        return view('rentals1.create', compact('availableCars', 'availableDrivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'has_driver' => 'required|boolean',
            'sim_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file uploads and save rental data
        $user = Auth::user();

        $rental = new Rental();
        $rental->user_id = $user->id;
        $rental->car_id = $request->car_id;
        $rental->has_driver = $request->has_driver;

        // Handle driver logic
        if ($request->has_driver) {
            $request->validate([
                'driver_id' => 'required|exists:drivers,id',
            ]);

            // Update the rental record with the selected driver
            $rental->driver_id = $request->driver_id;
        }

        $rental->sim_image = $request->file('sim_image')->store('sim_images', 'public');
        $rental->ktp_image = $request->file('ktp_image')->store('ktp_images', 'public') ?? null;
        $rental->payment_proof = $request->file('payment_proof')->store('payment_proofs', 'public') ?? null;

        // Save the rental record
        $rental->save();

        return redirect()->route('rentals.index')->with('success', 'Pemesanan berhasil dikirim. Menunggu konfirmasi.');
    }
    public function store1(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'has_driver' => 'required|boolean',
            'sim_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ktp_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file uploads and save rental data
        $user = Auth::user();

        $rental = new Rental();
        $rental->user_id = $user->id;
        $rental->car_id = $request->car_id;
        $rental->has_driver = $request->has_driver;

        // Handle driver logic
        if ($request->has_driver) {
            $request->validate([
                'driver_id' => 'required|exists:drivers,id',
            ]);

            // Update the rental record with the selected driver
            $rental->driver_id = $request->driver_id;
        }

        $rental->sim_image = $request->file('sim_image')->store('sim_images', 'public');
        $rental->ktp_image = $request->file('ktp_image')->store('ktp_images', 'public') ?? null;
        $rental->payment_proof = $request->file('payment_proof')->store('payment_proofs', 'public') ?? null;

        // Save the rental record
        $rental->save();

        return redirect()->route('rentals1.index')->with('success', 'Pemesanan berhasil dikirim. Menunggu konfirmasi.');
    }
}
