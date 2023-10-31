<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Detail Produk</h1>

        @foreach($reads as $read)
            <p>========================================================</p>
            <p>Kode Produk : {{$read -> productCode}}</p>
            <p>Nama Produk : {{$read -> productName}}</p>
            <p>Jenis Produk: {{$read -> productLine}}</p>
            <p>Skala Produk : {{$read -> productScale}}</p>
            <p>Vendor Produk : {{$read -> productVendor}}</p>
            <p>Deskripsi Produk : {{$read -> productDescription}}</p>
            <p>Stok : {{$read -> quantityInStock}}</p>
            <p>Harga : {{$read -> buyPrice}}</p>
            <p>MSRP: {{$read -> MSRP}}</p>
        @endforeach
</body>
</html>