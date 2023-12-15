<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>

    <div class="container">
        <h1>Edit Produk Makeup</h1>
        <form action="{{ route('makeup-products.update', $makeupProduct->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $makeupProduct->name }}" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $makeupProduct->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="brand">Merek:</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $makeupProduct->brand }}" required>
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $makeupProduct->price }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stok:</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $makeupProduct->stock }}" required>
            </div>

            <button type="submit"  class="btn btn-primary" style="background-color: #ff69b4; border-color: #ff69b4;">Perbarui</button>
        </form>
    </div>
