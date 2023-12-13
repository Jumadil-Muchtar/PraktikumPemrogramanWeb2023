<!-- resources/views/rental/create.blade.php -->

@extends('layouts.template')

@section('content')
    <div class="container">
        <h2>Form Penyewaan Mobil</h2>
        <form action="{{ route('rental.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="car_model">Model Mobil:</label>
                <select name="car_model" class="form-control">
                    @foreach($availableCars as $car)
                        <option value="{{ $car->car_type }}">{{ $car->car_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="driver">Sewa Driver:</label>
                <select name="driver" class="form-control">
                    <option value="No">Tidak</option>
                    @foreach($availableDrivers as $driver)
                        <option value="Yes">{{ $driver->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sim">Foto SIM:</label>
                <input type="file" name="sim" class="form-control">
            </div>
            <div class="form-group">
                <label for="ktp">Foto KTP:</label>
                <input type="file" name="ktp" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
