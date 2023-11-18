@extends('layouts/main')

@include('partials/navbar')

@section('container')
    <h2 style="font-size: 36px;">Informasi Produk</h2>

    <table>
        <tr>
            <td>Nama Produk</td>
            <td>: {{ $product->productName }}</td>
        </tr>
        <tr>
            <td>Jenis Produk</td>
            <td>: {{ $product->productLine }}</td>
        </tr>
        <tr>
            <td>Skala Produk</td>
            <td>: {{ $product->productScale }}</td>
        </tr>
        <tr>
            <td>Penjual Produk</td>
            <td>: {{ $product->productVendor }}</td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td>: {{ $product->productDescription }}</td>
        </tr>
        <tr>
            <td>Stok Barang</td>
            <td>: {{ $product->quantityInStock }}</td>
        </tr>
        <tr>
            <td>Harga Beli</td>
            <td>: {{ $product->buyPrice }}</td>
        </tr>
        <tr>
            <td>Harga Eceran Tertinggi</td>
            <td>: {{ $product->MSRP }}</td>
        </tr>
    </table>
    
   

    
    <a href="/product" class="btn btn-secondary button" style="color: #fff; margin-top: 10px;">Back to products</a>
@endsection