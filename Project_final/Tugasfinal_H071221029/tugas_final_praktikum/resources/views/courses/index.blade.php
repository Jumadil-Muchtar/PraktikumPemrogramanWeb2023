@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('path/to/your/custom.css') }}">
    <style>
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
@endpush

@section('content_header')
    <h1>Course Management</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Create Course</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Kursus</th>
                        <th>Deskripsi Kursus</th>
                        <th>Tanggal Dimulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Pengajar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            <td>{{ $course->instructor }}</td>
                            @if (Auth::user()->name == 'Admin' || $course->instructor == Auth::user()->name)
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                        <form action="{{ route('courses.destroy', $course->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            @else
                                <td>Not Authorized</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
