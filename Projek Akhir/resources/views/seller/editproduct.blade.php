<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1 class="m-0">Edit Product</h1>
        </div>
        <div class="card-body">
            <form action="/updateproduct/{{$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="nama" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Description</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Category</label>
                    <select class="form-select" id="kategori" name="kategori" required>
                        <option value="computer & accessories" {{ $product->kategori === 'computer & accessories' ? 'selected' : '' }}>Computer & Accessories</option>
                        <option value="books" {{ $product->kategori === 'books' ? 'selected' : '' }}>Books</option>
                        <option value="shoes" {{ $product->kategori === 'shoes' ? 'selected' : '' }}>Shoes</option>
                        <option value="figurines" {{ $product->kategori === 'figurines' ? 'selected' : '' }}>Figurines</option>
                        <option value="musical instruments" {{ $product->kategori === 'musical instruments' ? 'selected' : '' }}>Musical Instruments</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $product->stok }}" required>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Image</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Update Product</button>
                    <a href="{{ url('Dashboard') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and Popper.js scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofSxegoGm5Rn5IBjf5EdFVfFbWq2jU01D" crossorigin="anonymous"></script>

</body>
</html>
