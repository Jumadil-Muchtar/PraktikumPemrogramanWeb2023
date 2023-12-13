<!-- resources/views/users/index.blade.php -->
@extends('layouts.template')

@section('content')
<div class="content">
    <h3>Daftar Pengguna</h3>
    <table class='table'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <!-- Tambahkan kolom-kolom lain jika diperlukan -->
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <!-- Tambahkan kolom-kolom lain jika diperlukan -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
