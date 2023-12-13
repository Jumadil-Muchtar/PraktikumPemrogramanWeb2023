@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Driver Management</h2>

        <!-- List Drivers -->
        <h3>List:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>License Picture</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($drivers as $driver)
                    <tr>
                        <td>{{ $driver->name }}</td>
                        <td>{{ $driver->gender }}</td>
                        <td>{{ $driver->license_picture }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('driver.edit', $driver->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('driver.destroy', $driver->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this driver?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create Driver Form -->
        <h3>Create:</h3>
        <form method="POST" action="{{ route('driver.store') }}" enctype="multipart/form-data">
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
                <input type="file" class="form-control" name="license_picture" accept="image/*" required>
            </div>
            <!-- Add other fields as needed -->
            <button type="submit" class="btn btn-success">Create Driver</button>
        </form>
    </div>
@endsection
