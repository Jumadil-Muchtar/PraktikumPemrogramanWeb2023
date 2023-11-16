@extends('layouts/main')

@section('container')
    <style>
        .card-title a {
            color:  black;
        }
        .card-title a:hover {
            color:  rgb(222, 0, 0);
        }
    </style>

    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><a class="text-decoration-none" href="{{ route('products', $product->productName) }}">{{ $product->productName }}</a></h5>
                            <p class="card-subtitle">Product Line : {{ $product->productLine }}</p>
                            <p class="card-text">Product Vendor : {{ $product->productVendor }}</p>
                            <p class="card-text">
                                <small>
                                    Stock : {{ $product->quantityInStock }}
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
@endsection