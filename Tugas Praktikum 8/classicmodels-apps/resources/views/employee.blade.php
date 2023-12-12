@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Employee</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Emp Number</th>
                    <th class="text-center align-middle" scope="col">Name</th>
                    <th class="text-center align-middle" scope="col">Email</th>
                    <th class="text-center align-middle" scope="col">Office Code</th>
                    <th class="text-center align-middle" scope="col">Reports To</th>
                    <th class="text-center align-middle" scope="col">Job Title</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employee as $employees)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $employees->employeeNumber }}</th>
                    <td class="text-center align-middle" >{{ $employees->firstName }} {{ $employees->lastName }}</td>
                    <td class="text-center align-middle" >{{ $employees->email }}</td>
                    <td class="text-center align-middle" >{{ $employees->officeCode }}</td>
                    <td class="text-center align-middle" >{{ $employees->reportsTo }}</td>
                    <td class="text-center align-middle" >{{ $employees->jobTitle }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
