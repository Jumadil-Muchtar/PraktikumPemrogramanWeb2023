@extends('layouts/main')

@section('container')
    <style>
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-top: 12rem;
        }
        .content img{
            width: 700px;
        }
        .content .sub-content{
            position: absolute;
            z-index: -1;
            top: 28%;
        }
        .heading {
            font-size: 7rem;
            font-weight: bold
        }
    </style>

    <div class="content">
        <div class="sub-content">
            <h1 class="heading">CLASSIC</h1>
        </div>
        <img src="img/classicCar.png" alt="Classic Car">
        <a href="/products" class="btn btn-secondary w-25 mt-5">Search</a>
    </div>
@endsection