@extends('layouts.main')

@section('container')
<div class="container">
    <div data-aos="zoom-in-up">
        <h1 class="mx-auto">Data Orders</h1>
        <table class="table table-bordered table-striped mx-auto" style="width: 70rem;">
            <thead>
                <tr>
                    <th scope="col">Order Number</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Required Date</th>
                    <th scope="col">Shipped Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Cust Number</th>

                </tr>
            </thead>
            <tbody>
                @foreach($order as $orders)
                <tr>
                    <th scope="row">{{ $orders->orderNumber }}</th>
                    <td>{{ $orders->orderDate }}</td>
                    <td>{{ $orders->requiredDate }}</td>
                    <td>{{ $orders->shippedDate }}</td>
                    <td>{{ $orders->status }}</td>
                    <td>{{ $orders->comment }}</td>
                    <td>{{ $orders->customerNumber }}</td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
