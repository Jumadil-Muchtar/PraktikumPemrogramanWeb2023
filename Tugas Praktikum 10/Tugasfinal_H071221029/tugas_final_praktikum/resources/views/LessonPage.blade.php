@extends('adminlte::page')

@section('content_header')
    <h1>Lesson Pages</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contents as $content)
                        <tr>
                            <td>{{ $content->title }}</td>
                            <td>{{ $content->content }}</td>
                            <td>
                                @if ($content->youtube_link)
                                    <a href="{{ $content->youtube_link }}" target="_blank" class="btn btn-success">Watch on YouTube</a>
                                @else
                                    <span class="text-muted">No YouTube link available</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">No lesson pages available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop