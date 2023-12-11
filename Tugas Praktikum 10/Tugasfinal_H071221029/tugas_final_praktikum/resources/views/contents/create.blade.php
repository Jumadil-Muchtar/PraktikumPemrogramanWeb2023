<!-- resources/views/contents/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Content</h2>
        <form action="{{ route('contents.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Content</button>
        </form>
    </div>
@endsection
