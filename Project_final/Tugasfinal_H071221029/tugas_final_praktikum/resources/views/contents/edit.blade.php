@extends('adminlte::page')

@section('content_header')
    <h1>Edit Content</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <!-- Content edit form goes here -->
            <form action="{{ route('contents.update', $content->id) }}" method="post">
                @csrf
                @method('PUT')

                <!-- Form fields go here -->
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ $content->title }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" class="form-control" required>{{ $content->content }}</textarea>
                </div>

                <!-- Add more fields as needed -->

                <div class="form-group">
                    <button type="submit" class="btn btn-update">Update Content</button>
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
        .btn-updatecontents {
            background-color: #27ae60; 
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-update:hover {
            background-color: #219d54; 
        }
    </style>
@stop
