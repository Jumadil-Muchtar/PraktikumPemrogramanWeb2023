@extends('layouts.main2')

@section('content')

@section('header')
    Add Product
@endsection

<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <form action="/storeproduct" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Category</label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="computer & accessories">Computer & Accessories</option>
                        <option value="books">Books</option>
                        <option value="shoes">Shoes</option>
                        <option value="figurines">Figurines</option>
                        <option value="musical instruments">Musical Instruments</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stok" name="stok" required>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                    <a href="Dashboard" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
