<!-- resources/views/courses/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Course</h2>
        <form action="{{ route('courses.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="course_name">Course Name:</label>
                <input type="text" name="course_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="instructor">Teacher :</label>
                <input type="text" name="instructor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="instructor_number">instructor_number:</label>
                <input type="number" name="instructor_number" class="form-control" required>
            </div>
            <br>
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Create Course</button>
        </form>
    </div>
@endsection
