@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mx-auto">Data Payments</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Customer Number</th>
                    <th scope="col">Check Number</th>
                    <th scope="col">Payment Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payment as $payments)
                <tr>
                    <th scope="row">{{ $payments->customerNumber }}</th>
                    <td>{{ $payments->checkNumber }}</td>
                    <td>{{ $payments->paymentDate }}</td>
                    <td>$ {{ $payments->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
