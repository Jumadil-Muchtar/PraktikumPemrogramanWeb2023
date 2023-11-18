@extends('layouts/main')

@include('partials/navbar')

@section('container')
    <h1 style="font-size: 36px;">Hasil Pencarian</h1>
    <ul>
        @foreach ($product as $products)
        <li><a href="{{ route('products.show', $products->productName) }}" 
            style="color: #7a6167;" >{{ $products->productName }}</a></li>
        @endforeach
    </ul>
@endsection