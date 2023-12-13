@extends('layouts.template')

@section('content')
    <div class="content">
        <h3>Edit Driver:</h3>
        <form method="POST" action="{{ route('drivers.update', $driver->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- Gunakan method 'PUT' untuk update --}}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $driver->name }}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" required>
                    <option value="Male" {{ $driver->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $driver->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="license_picture">License Picture:</label>
                <input type="file" class="form-control" name="license_picture">
            </div>
            <!-- Add other fields as needed -->
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="available" {{ $driver->status == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ $driver->status == 'booked' ? 'selected' : '' }}>Booked</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Driver</button>
        </form>
    </div>
@endsection
