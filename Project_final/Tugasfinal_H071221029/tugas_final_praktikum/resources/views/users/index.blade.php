@extends('adminlte::page')

@section('content_header')
    <h1>User Management</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary mb-3">Create User</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-delete btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* Style for the "Edit" button */
        .btn-edit {
            background-color: #27ae60;
            color: #ffffff;
        }

        .btn-edit:hover {
            background-color: #218c54;
        }

        /* Style for the "Delete" button */
        .btn-delete {
            background-color: #e67e22;
            color: #ffffff;
        }

        .btn-delete:hover {
            background-color: #d35400;
        }
    </style>
@stop
