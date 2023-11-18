@extends('layouts/main')

@include('partials/navbar')
@include('partials/carousel')

@section('container')

  <div class="container col-10">
    <h1 style="text-align: center; margin-top: 25px;">{{ $welcome }}</h1>
    <p style="text-align: center;">The classicmodels database is a retailer of scale models of classic cars. It contains typical business data, including information about customers, products, sales orders, sales order line items, and more.</p>  
  </div>

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col">
      <div class="card">
        <img src="img/porsche type 356.jpg" class="card-img-top" alt="Porsche Type 356">
        <div class="card-body">
          <h4 class="card-title" style="text-align: center">1948 Porsche 356-A Roadster</h4>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="img/37 lincoln berline.jpg" class="card-img-top" alt="1937 lincoln berline">
        <div class="card-body">
          <h4 class="card-title" style="text-align: center">1937 Lincoln Berline</h4>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="img/69 ford falcon.jpg" class="card-img-top" alt="1969 ford falcon">
        <div class="card-body">
          <h4 class="card-title" style="text-align: center">1969 Ford Falcon</h4>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="img/p-51d mustang.jpg" class="card-img-top" alt="p-51d mustang">
        <div class="card-body">
          <h4 class="card-title" style="text-align: center">P-51-D Mustang</h4>
        </div>
      </div>
    </div>
  </div>
  
  <div class="d-md-flex justify-content-md-end">
    <a href="/product" class="btn btn-outline-dark button" style="margin: 20px 0;">See more...</a>
  </div>

@endsection