@extends('layouts.main2')

@section('content')

@section('header')
    Users
@endsection
<div class="col" style="margin:0 auto;">
    <div class="card">
        <div class="dashboard mt-3 ml-4 mb-2 mr-3">
            <div class="card-body table-responsive p-0" style="height: 600px; width:auto; margin: 0 20px">
                <a href="/adduser" class="btn btn-success mb-3">Tambah User</a>
                <table class="table table-head-fixed table-bordered mt-2 mb-4" id="example1"
                    style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @if ($user->role !== 'admin')
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>--Dihash--</td>
                                    <td>{{ $user->role }}</td>
                                    <td style="text-align: center;">
                                        <a href="{{ url('/edituser/' . $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$user->id}}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$user->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{$user->id}}">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this User?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="/deleteuser/{{$user->id}}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
