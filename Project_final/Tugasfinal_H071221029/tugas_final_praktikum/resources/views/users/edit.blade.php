@extends('adminlte::page')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <!-- User edit form goes here -->
            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('PUT')

                <!-- Form fields go here -->
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="teacher" {{ $user->role === 'teacher' ? 'selected' : '' }}>Teacher</option>
                        <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="Umur">Umur (17-40):</label>
                    <input type="number" name="Umur" value="{{ $user->Umur }}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="Tempat_Lahir">Tempat Lahir:</label>
                    <input type="text" name="Tempat_Lahir" value="{{ $user->Tempat_Lahir }}" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="Tempat_Tinggal">Tempat Tinggal:</label>
                    <input type="text" name="Tempat_Tinggal" value="{{ $user->Tempat_Tinggal }}" class="form-control" required>
                </div>

                <!-- Add more fields as needed -->

                <div class="form-group">
                    <button type="submit" class="btn btn-updateuser">Update User</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        /* Style for the form container */
        .box {
            border: 1px solid #d2d6de;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }

        /* Style for form labels */
        label {
            font-weight: bold;
        }

        /* Style for form input fields */
        .form-control {
            border-radius: 3px;
            border: 1px solid #d2d6de;
            padding: 8px;
        }

        /* Style for form button */
        .btn-updateuser {
            background-color: #27ae60; /* Sesuaikan dengan warna yang Anda inginkan */
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-updateuser:hover {
            background-color: #219d54; /* Sesuaikan dengan warna yang Anda inginkan */
        }
    </style>
@stop
