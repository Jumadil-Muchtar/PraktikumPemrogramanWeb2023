@extends('adminlte::page')

@section('content_header')
    <h1>Edit Course</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <!-- Course edit form goes here -->
            <form action="{{ route('courses.update', $course->id) }}" method="post">
                @csrf
                @method('PUT')

                <!-- Form fields go here -->
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" required>{{ $course->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" value="{{ $course->start_date }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" value="{{ $course->end_date }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="instructor">Instructor</label>
                    <input type="text" name="instructor" value="{{ $course->instructor }}" class="form-control" required>
                </div>

                <!-- Add more fields as needed -->

                <div class="form-group">
                    <button type="submit" class="btn btn-updatecourse">Update Course</button>
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
        .btn-updatecourse {
            background-color: #27ae60; /* Sesuaikan dengan warna yang Anda inginkan */
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-updatecourse:hover {
            background-color: #219d54; /* Sesuaikan dengan warna yang Anda inginkan */
        }

        
    </style>
@stop
