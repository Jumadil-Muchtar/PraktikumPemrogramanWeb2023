<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product | classicmodels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body {
                background-color: #f8f9fa;
                font-family: 'Arial', sans-serif;
            }

            .product {
                padding: 50px 0;
            }

            .title {
                color: #007bff;
            }

            .table {
                margin-top: 20px;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .table thead {
                background-color: #007bff;
                color: #fff;
            }

            .table tbody tr:hover {
                background-color: #f0f0f0;
            }

            .table a {
                color: #007bff;
            }

            .table a:hover {
                text-decoration: none;
                color: #0056b3; 
            }
        </style>
</head>

<body>
    <div class="product">
        <div class="container text-center">
            <h1 class="title">Product Lists</h1>

            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Line</th>
                        <th scope="col">Product Vendor</th>
                        <th scope="col">Quantity in Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><a href="{{ route('product.details', ['productCode' => $product->productCode]) }}">{{ $product->productName }}</a></td>
                            <td>{{ $product->productLine }}</td>
                            <td>{{ $product->productVendor }}</td>
                            <td>{{ $product->quantityInStock }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
