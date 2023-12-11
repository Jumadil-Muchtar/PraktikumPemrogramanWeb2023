@extends('layouts.main')
<style>
    h1 {
        padding-top: 20px;
    }

    ul li a {
    text-decoration: none;
    color: #164863;
    position: relative;
}

ul li a::after {
    content: '';
    height: 2px; 
    width: 0;
    background: #164863;
    position: absolute;
    left: 0;
    bottom: -2px; 
    transition: width 0.5s; 
}

ul li a:hover::after {
    width: 100%;
}
</style>
@section('container')
    <div class="container mt-4">
        <div class="text-center">
            <h1 class="mb-4" style="color: #ddf2fd">Hasil Pencarian Produk</h1>
            <hr class="my-4">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <ul class="list-group">
                    @forelse ($products as $product)
                        <center>
                            <li class="list-group-item">
                                <a href="product/{{ $product->id }}/show">{{ $product->nama }}</a>
                            </li>
                        </center>
                    @empty
                        <center>
                            <li class="list-group-item">Tidak ada hasil yang ditemukan.</li>
                        </center>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="/product" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
