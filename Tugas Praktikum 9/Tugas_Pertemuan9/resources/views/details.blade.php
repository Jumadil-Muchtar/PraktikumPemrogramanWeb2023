<!DOCTYPE html>
<html>
<head>
    <title>Details</title>
</head>
<body>
    <h1>Detail Produk</h1>
    @if ($product)
        <p>============================================</p>
        <p>Id Produk : {{ $product->id }}</p>
        <p>Nama Produk : {{ $product->nama }}</p>
        <p>Merk Produk : {{ $product->merk }}</p>
        <p>Storage : {{ $product->storage }} GB</p>
        <p>Ram : {{ $product->ram }} GB</p>
        <p>Harga : Rp.{{ $product->harga}}</p>
    @else
        <p>Produk tidak ditemukan.</p>
    @endif
</body>
</html>
