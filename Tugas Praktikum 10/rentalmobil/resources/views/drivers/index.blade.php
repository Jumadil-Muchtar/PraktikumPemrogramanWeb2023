@extends('layouts.template')

@section('content')
    <div class="content">
        <h3>Driver List:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>License Picture</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($drivers as $driver)
                <tr>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->gender }}</td>
                    <td>
                        @if ($driver->license_picture)
                            <img src="{{ asset('storage/public/driver_images/' . $driver->license_picture) }}" alt="{{ $driver->name }}" style="max-width: 200px; max-height: 200px;">
                        @else
                            No picture available
                        @endif
                    </td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-primary">Edit</a>
                        <!-- Delete Button -->
                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this driver?')">Delete</button>
                        </form>
                    </td>
                    <td>{{ ucfirst($driver->status) }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <!-- Create Driver Form -->
        <h3>Create:</h3>
        <form method="POST" action="{{ route('drivers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="license_picture">License Picture:</label>
                <input type="file" class="form-control" name="license_picture">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="booked" {{ old('status') == 'booked' ? 'selected' : '' }}>Booked</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Create Driver</button>
        </form>
    </div>
@endsection
