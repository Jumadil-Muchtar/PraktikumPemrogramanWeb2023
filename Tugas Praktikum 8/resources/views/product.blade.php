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
            background-color: pink; 
        }
    </style>
</head>
<body>
    <h1>DATA PRODUK LENGKAP</h1>

        @foreach($data as $read)
            <p>###############################################</p>
            <p>NAMA PRODUK : {{$read -> productName}}</p> 
            {{-- blade itu pengganti echo --}}
            <p>JENIS PRODUK : {{$read -> productLine}}</p>
            <p>PRODUK VENDOR : {{$read -> productVendor}}</p>
            <p>STOK : {{$read -> quantityInStock}}</p>
        @endforeach
</body>
</html>