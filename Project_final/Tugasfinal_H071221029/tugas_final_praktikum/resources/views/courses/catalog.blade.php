@extends('adminlte::page')

@section('content_header')
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List of Courses</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Kursus</th>
                        <th>Deskripsi Kursus</th>
                        <th>Tanggal Dimulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Pengajar</th>
                        <th>Social Media</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->description }}</td>
                            <td>{{ $course->start_date }}</td>
                            <td>{{ $course->end_date }}</td>
                            <td>
                                <a href="https://wa.me/62{{ $course->instructor_number }}" class="btn btn-info" target="_blank">
                                    <i class="fab fa-whatsapp"></i> {{ $course->instructor }}
                                </a>
                            </td>
                            <td>
                                @if($course->instructor_instagram)
                                    <a href="https://www.instagram.com/{{ $course->instructor_instagram }}" class="btn btn-primary" target="_blank">
                                        <i class="fab fa-instagram"></i> {{ $course->instructor }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No courses available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop