@extends('layouts/main')

@include('partials/navbar')

@section('container')

   {{-- <ul>
      @foreach ($item as $product)
         {{-- <li>
           {{ $product->productName }}
         </li>
         <p>ProductLine : {{ $product->productLine }}</p>
         <p>ProductVendor : {{ $product->productVendor }}</p>
         <p>QuantityInStock : {{ $product->quantityInStock }}</p>  

         <h4 style="margin-top: 25px;">Nama Produk : 
            <a href="{{ route('products.show', $product->productName) }}" 
               style="color: #CD5C08;" >{{ $product->productName }}</a>
         </h4>
         <p>Product Line : {{ $product->productLine }}</p>
         <p>Product Vendor : {{ $product->productVendor }}</p>
         <p>Quantity In Stock : {{ $product->quantityInStock }}</p>
      @endforeach
   </ul> --}}

   <h2>{{ $intro }}</h2>
   <div class="row row-cols-2 row-cols-md-2 g-2" style="margin-bottom: 20px">
      @foreach ($item as $product)
         <div class="col">
            <div class="card h-100 border-secondary">
               <div class="card-body">
                  <h5 class="card-title">Nama Produk : 
                     <a href="{{ route('products.show', $product->productName) }}" 
                        style="color: #7a6167;" >{{ $product->productName }}</a>
                  </h5>
                  <p class="card-text" style="line-height: 1.0; font-size: 16px;">Product Line : {{ $product->productLine }}</p>
                  <p class="card-text" style="line-height: 1.0; font-size: 16px;">Product Vendor : {{ $product->productVendor }}</p>
                  <p class="card-text" style="line-height: 1.0; font-size: 16px;">Quantity In Stock : {{ $product->quantityInStock }}</p>                  
               </div>
            </div>
         </div>      
      @endforeach
   </div>
@endsection