@extends('layouts.main')

@section('container')
<div class="product-list row">
    @foreach ($products as $product)
    <div class="col-md-4 mb-3" data-aos="zoom-in-up">
        <div class="product-card card h-100 p-3" style="width: 22rem;">
            @if ($product->productLine === 'Classic Cars')
                <img src="images/Classic Cars.jpg" class="card-img-top" alt="Classic Cars Image">
            @elseif ($product->productLine === 'Motorcycles')
                <img src="images/Motorcycles.jpg" class="card-img-top" alt="Motorcycles Image">
            @elseif ($product->productLine === 'Trains')
                <img src="images/Trains.jpg" class="card-img-top" alt="Trains Image">
            @elseif ($product->productLine === 'Trucks and Buses')
                <img src="images/Trucks and Buses.jpg" class="card-img-top" alt="Trucks and Buses Image">
            @elseif ($product->productLine === 'Ships')
                <img src="images/Ships.jpg" class="card-img-top" alt="Ships Image">
            @elseif ($product->productLine === 'Planes')
                <img src="images/Planes.jpg" class="card-img-top" alt="Planes Image">
            @elseif ($product->productLine === 'Vintage Cars')
                <img src="images/Vintage Cars.jpg" class="card-img-top" alt="Vintage Cars Image">
            @endif

            <div class="card-body">
                <h5 class="card-title fw-700">{{ $product->productName }} ( {{ $product->productLine }} )</h5>
                <p class="card-text">{{ substr($product->productDescription, 0, 100) }}.....</p>
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
