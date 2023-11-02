@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mx-auto">Data Employee</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Emp Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Office Code</th>
                    <th scope="col">Reports To</th>
                    <th scope="col">Job Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employees)
                <tr>
                    <th scope="row">{{ $employees->employeeNumber }}</th>
                    <td>{{ $employees->firstName }} {{ $employees->lastName }}</td>
                    <td>{{ $employees->email }}</td>
                    <td>{{ $employees->officeCode }}</td>
                    <td>{{ $employees->reportsTo }}</td>
                    <td>{{ $employees->jobTitle }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
