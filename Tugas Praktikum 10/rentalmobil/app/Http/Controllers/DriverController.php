<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
        return view('drivers.index', compact('drivers'));
    }
    public function index1()
    {
        $availableDrivers = Driver::where('status', 'available')->get();
        $drivers = Driver::all();
        return view('penyewa.drivers.index', compact('availableDrivers'));   
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'license_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,booked',
        ]);

        $driver = new Driver();
        $driver->name = $validatedData['name'];
        $driver->gender = $validatedData['gender'];
        $driver->status = $validatedData['status'];


        // Handle file upload (if any)
        if ($request->hasFile('license_picture')) {
            $image = $request->file('license_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/driver_images', $imageName);
            $driver->license_picture = $imageName;
        }

        // Save driver data
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver berhasil ditambahkan');
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'license_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,booked',
            // Tambahkan validasi lain jika diperlukan
        ]);

        $driver = Driver::findOrFail($id);

        $driver->name = $validatedData['name'];
        $driver->gender = $validatedData['gender']; 
        $driver->status = $validatedData['status']; 

        // Handle file upload (if any)
        if ($request->hasFile('license_picture')) {
            $image = $request->file('license_picture');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/driver_images', $imageName);
            $driver->license_picture = $imageName;
        }

        // Save updated driver data
        $driver->save();

        return redirect()->route('drivers.index')->with('success', 'Driver berhasil diperbarui');
    }

    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver berhasil dihapus');
    }
}

