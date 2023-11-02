@extends('layouts.main')

@section('container')
<div class="container mt-5 p-3">
    <div data-aos="zoom-in-up">
        <h1 class="mx-auto">Data Offices</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Office Code</th>
                    <th scope="col">City</th>
                    <th scope="col">Address1</th>
                    <th scope="col">Address2</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Country</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Territory</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offices as $office)
                <tr>
                    <th scope="row">{{ $office->officeCode }}</th>
                    <td>{{ $office->city }}</td>
                    <td>{{ $office->addressLine1 }}</td>
                    <td>{{ $office->addressLine2 }}</td>
                    <td>{{ $office->phone }}</td>
                    <td>{{ $office->country }}</td>
                    <td>{{ $office->postalCode }}</td>
                    <td>{{ $office->territory }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
