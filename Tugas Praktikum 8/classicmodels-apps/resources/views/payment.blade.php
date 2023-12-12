@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Payments</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Customer Number</th>
                    <th class="text-center align-middle" scope="col">Check Number</th>
                    <th class="text-center align-middle" scope="col">Payment Date</th>
                    <th class="text-center align-middle" scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payment as $payments)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $payments->customerNumber }}</th>
                    <td class="text-center align-middle" >{{ $payments->checkNumber }}</td>
                    <td class="text-center align-middle" >{{ $payments->paymentDate ? date('d F Y', strtotime($payments->paymentDate))  : '-' }}</td>
                    <td class="text-center align-middle" >$ {{ $payments->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
