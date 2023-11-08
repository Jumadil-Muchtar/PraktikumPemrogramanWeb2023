<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProductTrucks&Buses</title>
    <style>
        h1 {
            text-align: center;
        }
        body {
            background-color: Pink; 
        }
    </style>
</head>
<body>
    <h1>DATA TRUCKS DAN BUSES</h1>

        @foreach($data as $read)
            <p>NAMA PRODUK : <a href="{{ route('readDetail', ['productCode' => $read->productCode]) }}">{{$read -> productName}}</a></p>
        @endforeach
</body>
</html>