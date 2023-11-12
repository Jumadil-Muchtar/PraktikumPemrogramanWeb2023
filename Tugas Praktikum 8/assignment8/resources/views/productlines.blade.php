@extends('layouts/main')

@include('partials/navbar')

@section('container')
    <h1>Hasil Pencarian</h1>
    <ul>
        @foreach ($product as $products)
        <li>{{ $product->productName }}</li>
        @endforeach
    </ul>
@endsection