<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create User</h2>
        <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" class="form-control" required>
                    <option value="student">Student</option>
                    <option value="teacher">Teacher</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Umur">Umur (20-40):</label>
                <input type="number" name="Umur" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Tempat_Lahir">Tempat Lahir:</label>
                <input type="text" name="Tempat_Lahir" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="Tempat_Tinggal">Tempat Tinggal:</label>
                <input type="text" name="Tempat_Tinggal" class="form-control" required>
            </div>
            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
@endsection
