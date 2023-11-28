@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>{{ $product->productName }}</h1>
    <p><strong>Product Line:</strong> {{ $product->productLine }}</p>
    <p><strong>Product Vendor:</strong> {{ $product->productVendor }}</p>
    <p><strong>Quantity In Stock:</strong> {{ $product->quantityInStock }}</p>
</div>
@endsection
