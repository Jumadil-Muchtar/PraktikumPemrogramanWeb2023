@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Order Details</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Order Number</th>
                    <th class="text-center align-middle" scope="col">Product Code</th>
                    <th class="text-center align-middle" scope="col">Quantity Ordered</th>
                    <th class="text-center align-middle" scope="col">Price Each</th>
                    <th class="text-center align-middle" scope="col">OrderLine Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderdetail as $orderdetails)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $orderdetails->orderNumber }}</th>
                    <td class="text-center align-middle" >{{ $orderdetails->productCode }}</td>
                    <td class="text-center align-middle" >{{ $orderdetails->quantityOrdered }}</td>
                    <td class="text-center align-middle" >$ {{ $orderdetails->priceEach }}</td>
                    <td class="text-center align-middle" >{{ $orderdetails->orderLineNumber }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
