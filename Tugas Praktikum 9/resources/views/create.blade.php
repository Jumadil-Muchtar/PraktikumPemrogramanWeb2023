<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
    <div class="container">
        <h1>Tambah Produk Makeup Baru</h1>
        <form action="{{ route('makeup-products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Produk:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi:</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

            <div class="form-group">
                <label for="brand">Merek:</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="stock">Stok:</label>
                <input type="number" class="form-control" id="stock" name="stock" required>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #ff69b4; border-color: #ff69b4;">Simpan</button>
        </form>

        @if(isset($makeupProducts))
            <h1>Daftar Produk Makeup</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Merek</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($makeupProducts as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

