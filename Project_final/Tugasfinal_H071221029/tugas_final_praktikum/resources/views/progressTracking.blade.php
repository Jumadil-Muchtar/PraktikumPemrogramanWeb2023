@extends('adminlte::page')

@section('content_header')
    <h1>Progress Tracking</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        </div>
        <div class="box-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Progress</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td>{{ $content->title }}</td>
                            <td>{{ $content->content }}</td>
                            <td>
                                <label class="checkbox-inline">
                                    <input type="checkbox" class="progress-checkbox" name="progress" value="{{ $content->id }}"> Completed
                                </label>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer">
            <p>Total Progress: <span id="total-progress">0%</span></p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const checkboxes = document.querySelectorAll('.progress-checkbox');
            const totalProgressElement = document.getElementById('total-progress');

            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    updateTotalProgress();
                });
            });

            function updateTotalProgress() {
                const totalCheckboxCount = checkboxes.length;
                const completedCheckboxCount = document.querySelectorAll('.progress-checkbox:checked').length;
                const totalProgress = (completedCheckboxCount / totalCheckboxCount) * 100;

                totalProgressElement.textContent = totalProgress.toFixed(2) + '%';
            }
        });
    </script>
@stop
