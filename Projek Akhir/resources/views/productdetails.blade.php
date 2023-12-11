@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/gambar_produk/' . $product->gambar) }}" class="img-fluid shadow rounded" alt="{{ $product->nama }}">
        </div>
        <div class="col-md-6">
            <h2 class="mb-3">{{ $product->nama }}</h2>
            <p class="text-muted">{{ $product->deskripsi }}</p>
            <hr>
            <p><strong>Kategori:</strong> {{ $product->kategori }}</p>
            <p><strong>Harga:</strong> Rp. {{ $product->harga }}</p>
            <p><strong>Stok:</strong> {{ $product->stok }}</p>

            <div class="btn-group mt-3">
                <button type="button" class="btn btn-success"><i class="bi bi-cart2"></i> Add to Cart</button>
                <button type="button" class="btn btn-danger"><i class="bi bi-heart"></i> Favorite</button>
            </div>
        </div>
    </div>
</div>
@endsection
