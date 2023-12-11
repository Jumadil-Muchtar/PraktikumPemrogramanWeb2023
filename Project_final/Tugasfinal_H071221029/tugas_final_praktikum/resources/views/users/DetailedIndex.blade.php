@extends('adminlte::page')

@section('content_header')
    <h1>Detailed User List</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Detailed User List</h3>
        </div>
        <div class="box-body">
            <table class="table">
                <!-- Detailed table headers go here -->
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <!-- Display more detailed user information -->
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <!-- Add view, edit, and delete buttons -->
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-xs btn-primary">View</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-warning">Edit</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-xs btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
