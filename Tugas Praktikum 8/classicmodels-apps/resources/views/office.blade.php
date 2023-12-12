@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Offices</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Office Code</th>
                    <th class="text-center align-middle" scope="col">City</th>
                    <th class="text-center align-middle" scope="col">Address1</th>
                    <th class="text-center align-middle" scope="col">Address2</th>
                    <th class="text-center align-middle" scope="col">Phone</th>
                    <th class="text-center align-middle" scope="col">Country</th>
                    <th class="text-center align-middle" scope="col">Postal Code</th>
                    <th class="text-center align-middle" scope="col">Territory</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offices as $office)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $office->officeCode }}</th>
                    <td class="text-center align-middle">{{ $office->city }}</td>
                    <td class="text-center align-middle">{{ $office->addressLine1 }}</td>
                    <td class="text-center align-middle">{{ $office->addressLine2 }}</td>
                    <td class="text-center align-middle">{{ $office->phone }}</td>
                    <td class="text-center align-middle">{{ $office->country }}</td>
                    <td class="text-center align-middle">{{ $office->postalCode }}</td>
                    <td class="text-center align-middle">{{ $office->territory }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
