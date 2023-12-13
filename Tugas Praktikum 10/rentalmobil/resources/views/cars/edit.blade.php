@extends('layouts.template')

@section('content')
    <div class="content">
        <h3>Edit Car:</h3>
        <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Gunakan method 'PUT' untuk update --}}
            <div class="form-group">
                <label for="car_type">Car Type:</label>
                <input type="text" class="form-control" name="car_type" value="{{ $car->car_type }}" required>
            </div>
            <div class="form-group">
                <label for="price_per_hour">Price per Hour:</label>
                <input type="number" class="form-control" name="price_per_hour" value="{{ $car->price_per_hour }}" required>
            </div>
            <div class="form-group">
                <label for="number_license">Number License:</label>
                <input type="text" class="form-control" name="number_license" value="{{ $car->number_license }}" required>
            </div>
            <div class="form-group">
                <label for="car_image">Car Image:</label>
                <input type="file" class="form-control-file" name="car_image">
            </div>
            <!-- Add other fields as needed -->
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="available" {{ $car->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ $car->status == 'booked' ? 'selected' : '' }}>Booked</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Car</button>
        </form>
    </div>
@endsection
