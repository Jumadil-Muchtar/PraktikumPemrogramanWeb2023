@extends('layouts.main')

@section('container')
    <div class="card mb-2 p-3" data-aos="zoom-in-up">
        <div class="card-body ">
            <h2 class="card-title">{{ $product->productName }} ( {{ $product->productLine}} )</h2>
            <img src="/images/pic1.jpg" class="card-img-top mx-auto d-block mb-3" alt="pic1" style="max-width: 600px; max-height: 600px;">
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

