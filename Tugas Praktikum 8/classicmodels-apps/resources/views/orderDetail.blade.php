@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mx-auto">Order Details</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Order Number</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Quantity Ordered</th>
                    <th scope="col">Price Each</th>
                    <th scope="col">OrderLine Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderdetail as $orderdetails)
                <tr>
                    <th scope="row">{{ $orderdetails->orderNumber }}</th>
                    <td>{{ $orderdetails->productCode }}</td>
                    <td>{{ $orderdetails->quantityOrdered }}</td>
                    <td>$ {{ $orderdetails->priceEach }}</td>
                    <td>{{ $orderdetails->orderLineNumber }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
