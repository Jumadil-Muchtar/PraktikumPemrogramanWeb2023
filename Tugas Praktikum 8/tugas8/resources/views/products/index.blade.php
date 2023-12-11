@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1>Product List</h1>

    <form action="{{ url('/filter-by-product-line') }}" method="get">
        <div class="form-group">
            <label for="productLine">Select Product Line:</label>
            <select name="productLine" id="productLine" class="form-control">
                <option value="Motorcycles">Motorcycles</option>
                <option value="Classic Cars">Classic Cars</option>
                <option value="Vintage Cars">Vintage Cars</option>
                <option value="Trucks and Buses">Trucks and Buses</option>
                <option value="Planes">Planes</option>
                <option value="Ships">Ships</option>
                <option value="Trains">Trains</option>
                <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    @if(isset($productLine))
        <h2>Product Line: {{ $productLine }}</h2>
    @endif

    @if($products)
        <table class="table">
            <thead>
                <tr>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>Product Line</th>
                    <th>Product Vendor</th>
                    <th>Quantity In Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->productCode }}</td>
                        <td><a href="{{ url('/product/' . $product->productCode) }}">{{ $product->productName }}</a></td>
                        <td>{{ $product->productLine }}</td>
                        <td>{{ $product->productVendor }}</td>
                        <td>{{ $product->quantityInStock }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No products found for the specified product line.</p>
    @endif

</div>

@endsection
