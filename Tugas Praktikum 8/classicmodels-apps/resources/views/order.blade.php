@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mb-3">Data Orders</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th class="text-center align-middle" scope="col">Order Number</th>
                    <th class="text-center align-middle" scope="col">Order Date</th>
                    <th class="text-center align-middle" scope="col">Required Date</th>
                    <th class="text-center align-middle" scope="col">Shipped Date</th>
                    <th class="text-center align-middle" scope="col">Status</th>
                    <th class="text-center align-middle" scope="col">Comment</th>
                    <th class="text-center align-middle" scope="col">Cust Number</th>

                </tr>
            </thead>
            <tbody>
                @foreach($order as $orders)
                <tr>
                    <th class="text-center align-middle" scope="row">{{ $orders->orderNumber }}</th>
                    <td class="text-center align-middle">{{ date('d F Y',strtotime($orders->orderDate)) }}</td>
                    <td class="text-center align-middle">{{ date('d F Y',strtotime($orders->requiredDate)) }}</td>
                    <td class="text-center align-middle">{{ $orders->shippedDate ? date('d F Y', strtotime($orders->shippedDate)) : '-' }}</td>
                    <td class="text-center align-middle">{{ $orders->status }}</td>
                    <td class="align-middle text-wrap" style="max-width: 30ch;">{{ $orders->comments }}</td>
                    <td class="text-center align-middle">{{ $orders->customerNumber }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
