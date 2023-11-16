@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Produk</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group my-3">
                <label for="category">Kategori:</label>
                <select class="form-select form-select-md mb-3 @error('category') is-invalid @enderror" name="category" aria-label="Medium select example">
                    <option selected>Open this select menu</option>
                    <option value="Foods">Foods</option>
                    <option value="Drinks">Drinks</option>
                    <option value="T-Shirts">T-Shirts</option>
                    <option value="Shirts">Shirts</option>
                    <option value="Cars">Cars</option>
                    <option value="Motorcycles">Motorcycles</option>
                </select>
                {{-- <input type="text" name="category" class="form-control @error('category') is-invalid @enderror"> --}}
                @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea name="description" class="form-control" style="height: 250px;" rows="5">{{ old('description') }}</textarea>
            </div>
            <div class="form-group my-3">
                <label for="price">Harga:</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Gambar Produk:</label>
                <input type="file" name="image" class="form-control-file">
            </div>
            
            <button type="submit" class="btn btn-primary my-3">Simpan</button>
        </form>
    </div>
@endsection
