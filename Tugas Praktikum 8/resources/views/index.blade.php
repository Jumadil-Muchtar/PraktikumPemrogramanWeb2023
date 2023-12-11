@extends('layout/template')

@section('carousel')
    <style>
        .carousel-inner img {
            height: 95vh;
            object-fit: cover;
        }
    </style>

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
                <img src="https://i.pinimg.com/564x/3b/53/48/3b5348481d3358be950b2e8275951ece.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/736x/f5/c3/05/f5c30525b780e0524b796c93d6aded8f.jpg" class="d-block w-100"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://i.pinimg.com/736x/e7/dd/08/e7dd0814e55f544825f330008f4e9aa2.jpg" class="d-block w-100" 
                    alt="...">
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
@endsection

@section('content')
    <style>
        .container {
            height: 50vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <div class="container">
        <a href="/products" class="btn btn-success">SILAHKAN BERBELANJA</a>
    </div>
@endsection
