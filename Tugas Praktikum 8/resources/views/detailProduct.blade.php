<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        h1 {
            text-align: center;
        }
        body {
            background-color: gray; 
        }
    </style>
</head>
<body>
    <h1>DETAIL PRODUK</h1>

    @foreach($data as $read)
        <p>Kode Produk : {{$read -> productCode}}</p>
        <p>Nama Produk : {{$read -> productName}}</p>
        <p>Jenis Produk: {{$read -> productLine}}</p>
        <p>Skala Produk : {{$read -> productScale}}</p>
        <p>Vendor Produk : {{$read -> productVendor}}</p>
        <p>Deskripsi Produk : {{$read -> productDescription}}</p>
        <p>Stok : {{$read -> quantityInStock}}</p>
        <p>Harga : {{$read -> buyPrice}}</p>
        <p>MSRP: {{$read -> MSRP}}</p>
        {{-- bladde itu pengganti echo --}}
    @endforeach
</body>
</html>
