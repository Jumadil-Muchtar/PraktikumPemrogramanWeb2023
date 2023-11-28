<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Produk</h1>

    <p><strong>Nama:</strong> {{ $product->name }}</p>
    <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
    <p><strong>Harga:</strong> {{ $product->price }}</p>

    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
    </form>
@endsection
