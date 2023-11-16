@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('title')
        Hero Details
    @endsection
    <link rel="stylesheet" href="css/style.css">
    <style>
        th,td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="product" >
        <div class="container">
            <h1 class="title mt-3 text-center">Hero Details</h1>
            <a href="/" class="btn btn-success">Back</a>
            <table class="table table-bordered mt-4 text-center" style="margin-bottom: 75px ">
                <thead>
                    <tr>
                        <th scope="col">Hero</th>
                        <th scope="col">Role</th>
                        <th scope="col">Type</th>
                        <th scope="col">Ability</th>
                        <th scope="col">Description</th>
                        <th scope="col">Difficulty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($heroes as $row)
                        <tr>
                            <td>{{$row->hero}}</td>
                            <td>{{$row->role}}</td>
                            <td>{{$row->type}}</td>
                            <td>{{$row->ability}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->difficulty}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>

