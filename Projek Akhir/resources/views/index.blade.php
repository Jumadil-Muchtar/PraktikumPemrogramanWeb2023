@extends('layouts.main')

@section('content')
    <style>
        .card {
            border-radius: 0;
        }

        .category .col {
            border: 2px solid skyblue;
            padding: 10px;
            height: 98px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
        }

        .card {
        border-radius: 10px;
        margin-bottom: 20px;
        overflow: hidden;
        border: 2px solid #3490dc;
        height: 300px;
        display: flex;
        flex-direction: column; /* Stack children elements vertically */
    }

    .card img {
        object-fit: cover;
        height: 150px;
        width: 100%;
    }

    .card-body {
        padding: 15px;
        flex-grow: 1; /* Grow and take remaining space */
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Distribute space between child elements */
    }

    .card-title,
    .card-text {
        margin: 0; /* Remove default margin */
    }

    .card a {
    color: inherit; /* Inherit color from the parent element */
    text-decoration: none; /* Remove default underline style */
}

    .btn-action {
        width: 100%;
    }

    /* Additional Styles */
    .category {
        margin-top: 20px;
    }

    .products {
        margin-top: 50px;
    }
    </style>

    <div class="container mt-5">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/banner1.jpg" class="d-block w-100" alt="..."
                        style="border-radius: 30px; height:300px">
                </div>
                <div class="carousel-item">
                    <img src="images/banner2.jpg" class="d-block w-100" alt="..."
                    style="border-radius: 30px; height:300px">
                </div>
                <div class="carousel-item">
                    <img src="images/banner3.jpg" class="d-block w-100" alt="..."
                    style="border-radius: 30px; height:300px">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="category">
            <h1 class="mt-5">CATEGORY</h1>
            <div class="row">
                <div class="col">Computer & Accessories</div>
                <div class="col">Books</div>
                <div class="col">Shoes</div>
                <div class="col">Figurines</div>
                <div class="col">Musical Instruments</div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="products">
            <div class="row row-cols-1 row-cols-md-5">
                @foreach ($products as $product)
                    <div class="col mb-4">
                        <a href="{{ route('product.details', ['id' => $product->id]) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ asset('storage/gambar_produk/' . $product->gambar) }}" class="card-img-top"
                                    alt="{{ $product->nama }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->nama }}</h5>
                                    <p class="card-text">Rp. {{ $product->harga }}</p>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-outline-success btn-action ms-2"><i
                                                class="bi bi-cart2"></i></a>
                                        <a href="#" class="btn btn-outline-danger btn-action"><i
                                                class="bi bi-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
