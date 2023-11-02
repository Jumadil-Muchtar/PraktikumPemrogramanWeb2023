@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mx-auto">Data Customers</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Custumer Number</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $customers)
                <tr>
                    <th scope="row">{{ $customers->customerNumber }}</th>
                    <td>{{ $customers->customerName }}</td>
                    <td>{{ $customers->addressLine1 }}</td>
                    <td>{{ $customers->phone }}</td>
                    <td>{{ $customers->city }}</td>
                    <td>{{ $customers->country }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
