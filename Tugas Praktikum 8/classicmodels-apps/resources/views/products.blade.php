@extends('layouts.main')

@section('container')
    <div class="card mb-2 p-3" data-aos="zoom-in-up">
        <div class="card-body ">
            <h2 class="card-title">{{ $product->productName }} ( {{ $product->productLine}} )</h2>
            @if ($product->productLine === 'Classic Cars')
            <img src="{{ asset('images/Classic Cars.jpg') }}" class="card-img-top mx-auto d-block mb-3"  alt="Classic Cars Image" style="max-width: 600px; max-height: 600px;">
            @elseif ($product->productLine === 'Motorcycles')
            <img src="{{ asset('images/Motorcycles.jpg') }}" class="card-img-top mx-auto d-block mb-3"   alt="Motorcycles Image" style="max-width: 600px; max-height: 600px;">
            @elseif ($product->productLine === 'Trains')
            <img src="{{ asset('images/Trains.jpg') }}" class="card-img-top mx-auto d-block mb-3"   alt="Trains Image">
            @elseif ($product->productLine === 'Trucks and Buses')
            <img src="{{ asset('images/Trucks and Buses.jpg') }}" class="card-img-top mx-auto d-block mb-3"  alt="Trucks and Buses Image" style="max-width: 600px; max-height: 600px;">
            @elseif ($product->productLine === 'Ships')
            <img src="{{ asset('images/Ships.jpg') }}" class="card-img-top mx-auto d-block mb-3"  alt="Ships Image" style="max-width: 600px; max-height: 600px;">
            @elseif ($product->productLine === 'Planes')
            <img src="{{ asset('images/Planes.jpg') }}" class="card-img-top mx-auto d-block mb-3"  alt="Planes Image" style="max-width: 600px; max-height: 600px;">
            @elseif ($product->productLine === 'Vintage Cars')
            <img src="{{ asset('images/Vintage Cars.jpg') }}" class="card-img-top mx-auto d-block mb-3"  alt="Vintage Cars Image" style="max-width: 600px; max-height: 600px;">
            @endif
            <p class="card-text">{{ $product->productDescription }}</p>
            <p class="card-text">Vendor : {{ $product->productVendor }}</p>
            <h5 class="card-text text-primary">Stok: {{ $product->quantityInStock }}</h5>
            <h5 class="card-text text-success">$ {{ $product->buyPrice }}</h5>
        </div>
        <div>
            <hr class="border border-dark border-2 opacity-50">
          </div>
        <div class="card-footer bg-secondary">
            <a href="/product" class="btn btn-danger"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></i></a>
        </div>
    </div>
@endsection



