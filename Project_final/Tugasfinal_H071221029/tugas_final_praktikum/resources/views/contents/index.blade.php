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
    <h1>Content Management</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <a href="{{ route('contents.create') }}" class="btn btn-primary mb-3">Create Content</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td>{{ $content->title }}</td>
                            <td>{{ $content->content }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('contents.edit', $content->id) }}" class="btn btn-edit btn-sm">Edit</a>
                                    <form action="{{ route('contents.destroy', $content->id) }}" method="post">
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
@stop
