<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <h1>Data Produk Lengkap</h1>

        @foreach($reads as $read)
            <p>========================================================</p>
            <p>Nama Produk : {{$read -> productName}}</p>
            <p>Jenis : {{$read -> productLine}}</p>
            <p>Vendor Produk : {{$read -> productVendor}}</p>
            <p>Stok : {{$read -> quantityInStock}}</p>
        @endforeach
</body>
</html>