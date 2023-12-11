<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductClassicCars</title>
</head>
<body>
    <h1>Data Produk Berjenis {{$reads[0]->productLine}}</h1>
    @foreach($reads as $read)
    <p>========================================================</p>
    <p>Nama Produk : <a href="{{ route('detailProduct', ['detailProduct' => $read->productCode]) }}">{{$read->productName}}</a></p>
    @endforeach
</body>
</html>
