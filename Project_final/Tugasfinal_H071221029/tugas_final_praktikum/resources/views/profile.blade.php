@extends('adminlte::page')

@section('content_header')
    <h1>User Profile</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Umur</th>
                        <th>Tempat Lahir</th>
                        <th>Tempat Tinggal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $user = auth()->user();
                    @endphp
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->Umur }}</td>
                        <td>{{ $user->Tempat_Lahir }}</td>
                        <td>{{ $user->Tempat_Tinggal }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @push('css')
        <style>
            /* Tambahkan ini untuk memberi warna latar belakang pada baris tabel saat dihover */
            .table tbody tr:hover {
                background-color: #f5f5f5;
                cursor: pointer;
            }

            /* Tambahkan ini untuk memberi warna latar belakang pada header tabel */
            .table thead th {
                background-color: #f8f9fa;
                padding: 10px;
            }
        </style>
    @endpush
@endsection
