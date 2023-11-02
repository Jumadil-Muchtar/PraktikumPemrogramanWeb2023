@extends('layouts.main')

@section('container')
<div class="product-list row">
    @foreach ($products as $product)
    <div class="col-md-4 mb-3" data-aos="zoom-in-up"> <!-- Each product card takes up 1/3 of the row (3 cards in 1 row) -->
        <div class="product-card card h-100 p-3" style="width: 22rem;">
            <img src="images/pic1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-700">{{ $product->productName }} ( {{ $product->productLine }} )</h5>
                <p class="card-text">{{ substr($product->productDescription, 0,100) }}.....</p>
                <p class="card-text">Vendor : {{ $product->productVendor }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-secondary text-light">
                <div>
                    <h2>
                        <a href="/product/details/{{ $product->productCode }}" class="btn btn-primary"><i class="fa-solid fa-circle-info fa-lg" style="color: #ffffff;"></i></a>
                    </h2>
                </div>
                <div class="p-1">
                    <h6 class="mb-1">Stok : {{ $product->quantityInStock }}</h6>
                    <h6 class="mb-0">$ {{ $product->buyPrice }}</h6>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
