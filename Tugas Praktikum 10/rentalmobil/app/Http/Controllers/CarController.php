<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }
    
    public function index1()
    {
        $availableCars = Car::where('status', 'available')->get();
        $cars = Car::all();
        return view('penyewa.cars.index', compact('availableCars'));    
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'car_type' => 'required|string',
            'price_per_hour' => 'required|numeric',
            'number_license' => 'required|string',
            'car_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,booked',
        ]);

        $imageName = time() . '.' . $request->car_image->extension();
        $request->car_image->storeAs('public/car_images', $imageName);

        Car::create([
            'car_type' => $validatedData['car_type'],
            'price_per_hour' => $validatedData['price_per_hour'],
            'number_license' => $validatedData['number_license'],
            'car_image' => $imageName,
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.show', compact('car'));
    }

    public function edit($id)
    {
        $car = Car::find($id);
    
        return view('cars.edit', compact('car'));
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'car_type' => 'required|string',
            'price_per_hour' => 'required|numeric',
            'number_license' => 'required|string',
            'car_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:available,booked',
        ]);

        $car = Car::findOrFail($id);

        if ($request->hasFile('car_image')) {
            $imageName = time() . '.' . $request->car_image->extension();
            $request->car_image->storeAs('public/car_images', $imageName);
            $car->car_image = $imageName;
        }

        $car->car_type = $validatedData['car_type'];
        $car->price_per_hour = $validatedData['price_per_hour'];
        $car->number_license = $validatedData['number_license'];
        $car->status = $validatedData['status'];

        $car->save();

        return redirect()->route('cars.index')->with('success', 'Detail mobil berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
