@extends('layout.template')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>
    @if($productdetails)
    <table class="table">
        <tr>
            <th>Kode Produk</th>
            <td>{{ $productdetails->productCode }}</td>
        </tr>
        <tr>
            <th>Nama Produk</th>
            <td>{{ $productdetails->productName }}</td>
        </tr>
        <tr>
            <th>Product Scale</th>
            <td>{{ $productdetails->productScale }}</td>
        </tr>
        <tr>
            <th>Product Vendor</th>
            <td>{{ $productdetails->productVendor }}</td>
        </tr>
        <tr>
            <th>Produt Description</th>
            <td>{{ $productdetails->productDescription }}</td>
        </tr>
        <tr>
            <th>Quantity In Stock</th>
            <td>{{ $productdetails->quantityInStock }}</td>
        </tr>
        <tr>
            <th>Buy Price</th>
            <td>{{ $productdetails->buyPrice }}</td>
        </tr>
        <tr>
            <th>MSRP</th>
            <td>{{ $productdetails->MSRP }}</td>
        </tr>
        <tr>
            <th>Product Line</th>
            <td>{{ $productdetails->productLine }}</td>
        </tr>
        <!-- Tambahkan informasi lainnya dari produk -->
    </table>
    <button type="button" class="btn btn-primary">Buy</button>
    @else
    <p>Produk tidak ditemukan.</p>
    @endif
</div>
@endsection
