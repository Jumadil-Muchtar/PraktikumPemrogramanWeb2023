@extends('layouts.main')
<style>
    .hero__heading {
        font-size: 36px;
        color: #333;
        text-align: center;
    }

</style>
@section('container')
    <center>
        <div class="hero__content h-75 container-custom position-relative">
            <div class="d-flex h-100 align-items-center hero__content-width">
                <div>
                    <h1 class="fw-bold" style="font-size: 50px; color: #9bbec8;">Chizu Shop</h1>
                    <p class="lead fw-bold" style="color: #164863; font-size: bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro quisquam fugit odio, nisi nemo suscipit ab omnis adipisci facere sapiente aspernatur dignissimos reprehenderit repudiandae nobis, nihil, sequi ad recusandae quae! Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate laudantium quisquam error illum, minima esse doloribus quidem magnam dignissimos! Ducimus excepturi quisquam, ratione adipisci perspiciatis totam vero commodi beatae ipsa!</p>
                    <a href="/product" class="mt-2 btn btn-secondary" role="button"><span></span>Go To Product</a>
                </div>
            </div>
        </div>
    </center>
@endsection
