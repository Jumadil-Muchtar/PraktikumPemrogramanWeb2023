@extends('layouts/main')

@section('container')
    <h2 class="my-4">Informasi Produk</h2>

    <h3 class="mb-3">{{ $product->productName }}</h3>
    <p><span class="fw-medium">Jenis Produk : </span>{{ $product->productLine }}</p>
    <p><span class="fw-medium">Skala Produk : </span>{{ $product->productScale }}</p>
    <p><span class="fw-medium">Product Vendor : </span>{{ $product->productVendor }}</p>
    <p><span class="fw-medium">Deskripsi : </span>{{ $product->productDescription }}</p>
    <p><span class="fw-medium">Stock : </span>{{ $product->quantityInStock }}</p>
    <p><span class="fw-medium">Harga Beli : </span>{{ $product->buyPrice }}</p>
    <p><span class="fw-medium">Harga Jual : </span>{{ $product->MSRP }}</p>

    <a href="/products" class="btn btn-danger mt-2">Back to products</a>
@endsection
