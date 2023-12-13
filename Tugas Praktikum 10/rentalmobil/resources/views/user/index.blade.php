@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Management</h2>

        <!-- User List -->
        <h3>User List:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create or Edit User Form -->
        @if(isset($userToEdit))
            <h3>Edit User:</h3>
            <form method="POST" action="{{ route('users.update', $userToEdit->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $userToEdit->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $userToEdit->email }}" required>
                </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        @else
            <h3>Create User:</h3>
            <!-- Create User Form -->
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <!-- Add other fields as needed -->
                <button type="submit" class="btn btn-success">Create User</button>
            </form>
        @endif
    </div>
@endsection
