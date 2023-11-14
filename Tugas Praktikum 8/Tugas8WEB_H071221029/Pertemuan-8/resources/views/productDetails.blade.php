@extends('layout.template')


@section('content')
<table class="table mt-5">
    <thead>
        <tr class="table-primary">
            <th scope="col">No.</th>
            <th scope="col">Product Code</th>
            <th scope="col">Name</th>
            <th scope="col">Buy Price</th>
            <th scope="col">Product Line</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($productdetails as $productdetail) 
        <tr>
            <th scope="row">{{ $loop -> iteration }}</th>
            <td>{{ $productdetail->productCode }}</td>
            <td><a href="/product/{{ $productdetail->productCode }}">{{ $productdetail->productName }}</a></td>
            <td>{{ $productdetail->buyPrice }}</td>
            <td>{{ $productdetail->productLine }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection