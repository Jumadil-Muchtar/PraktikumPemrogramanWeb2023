@extends('adminlte::page')

@push('css')
    <link rel="stylesheet" href="{{ asset('path/to/your/custom.css') }}">
    <style>
        .table tbody tr:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }

        .table thead th {
            background-color: #f8f9fa;
            padding: 10px;
        }

        .form-inline {
            transition: width 0.3s;
        }

        .form-inline:hover {
            width: 100%;
        }
        
        /* Style for the "Home" button */
        .btn-home {
            background-color: #3498db;
            color: #ffffff;
            border: none;
        }

        .btn-home:hover {
            background-color: #2980b9;
        }

        /* Style for the "Details" button */
        .btn-details {
            background-color: #27ae60;
            color: #ffffff;
        }

        .btn-details:hover {
            background-color: #218c54;
        }

        /* Style for the "Edit" button */
        .btn-edit {
            background-color: #e67e22;
            color: #ffffff;
        }

        .btn-edit:hover {
            background-color: #d35400;
        }
    </style>
@endpush

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Course List</h1>
        </div>
        <div class="col-md-6 text-right">
            <ol class="breadcrumb">
                {{-- <li><a href="{{ route('user-dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li> --}}
            </ol>
        </div>
    </div>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            {{-- <h3 class="box-title">Course List</h3> --}}
        </div>
        <div class="box-body">
            <div class="row justify-content-end mb-3">
                <div class="col-md-4">
                    <form action="{{ route('homepage') }}" method="GET" class="form-inline">
                        <div class="form-group">
                            <label for="search" class="mr-2">Search Course:</label>
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary ml-2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <!-- Pindahkan tombol "Home" di sini -->
                    <a href="{{ route('user-dashboard') }}" class="btn btn-home"><i class="fa fa-home"></i> Home</a>
                </div>
            </div>
            <!-- Tambahkan bagian untuk menampilkan hasil pencarian -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Course Name</th>
                            <!-- Add other headers as needed -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <td>{{ $course->course_name }}</td>
                                <!-- Add other columns as needed -->
                                <td>
                                    <a href="https://www.google.com/search?q={{ urlencode($course->course_name) }}" class="btn btn-sm btn-details" target="_blank">Details</a>
                                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-edit">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No courses found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- {{ $courses->links() }} --}}
        </div>
    </div>
@endsection
