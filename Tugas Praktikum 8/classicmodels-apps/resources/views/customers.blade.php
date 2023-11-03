@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Customers</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Custumer Number</th>
                    <th class="text-center align-middle" scope="col">Customer Name</th>
                    <th class="text-center align-middle" scope="col">Address</th>
                    <th class="text-center align-middle" scope="col">Phone</th>
                    <th class="text-center align-middle" scope="col">City</th>
                    <th class="text-center align-middle" scope="col">Country</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $customers)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $customers->customerNumber }}</th>
                    <td class="text-center align-middle" >{{ $customers->customerName }}</td>
                    <td class="text-center align-middle" >{{ $customers->addressLine1 }}</td>
                    <td class="text-center align-middle" >{{ $customers->phone }}</td>
                    <td class="text-center align-middle" >{{ $customers->city }}</td>
                    <td class="text-center align-middle" >{{ $customers->country }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
