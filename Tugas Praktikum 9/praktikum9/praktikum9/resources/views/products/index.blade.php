@extends('layouts.app')

@section('content')
    <style>
        img {
            height: 200px;
            object-fit: contain;
        }
    </style>

    <div class="container">
        <form action="" method="GET">
            <div class="input-group mb-3 mx-auto" style="width: 500px;">
                <input type="text" class="form-control" placeholder="Search" autocomplete="off" name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
            </div>
        </form>
        <h2 class="text-center">Daftar Produk</h2>

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row my-4 card-container">
            @forelse ($products as $product)
                <div class="col-md-3">
                    <a href="{{ route('products.show', $product) }}" class="card-link">
                        <div class="card mb-3">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top bg-light" alt="{{ $product->name }}">
                            <div class="card-body">
                                <a href="{{ route('products.show', $product) }}" class="card-title text-decoration-none text-dark">{{ $product->name }}</a>
                                <p class="card-text fw-bold my-2 ">Rp.{{ number_format($product->price, 2, ',', '.') }}</p>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are your sure ?')"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-md-12">
                    <p class="text-center align-items-center fs-4 fw-light">The product you are looking for does not exist.</p>
                </div>
            @endforelse
        </div>
        
        <div class="row">
            <div class="col-md-6">
                    <a href="/" class="text-center btn btn-danger"><i class="bi bi-arrow-left"></i></a>
            </div>
            <div class="d-flex justify-content-end col-md-6">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    @endsection

