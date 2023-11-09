<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <h1>Daftar Produk Hape</h1>
    @foreach ($product as $produk)
    <p>============================================</p>
    <p>Id Produk : {{ $produk->id }}</p>
    <p>Nama Produk : <a href="{{ route('details', ['details' => $produk->id]) }}">{{$produk->nama}}</a></p>
        <!-- <p>Nama Produk : {{ $produk->nama }}</p> -->
        <!-- <p>Merk Produk : {{ $produk->merk }}</p>
        <p>Storage : {{ $produk->storage }} GB</p>
        <p>Ram : {{ $produk->ram }} GB</p>
        <p>Harga : Rp.{{ $produk->harga}}</p> -->
        @endforeach
</body>
</html>
