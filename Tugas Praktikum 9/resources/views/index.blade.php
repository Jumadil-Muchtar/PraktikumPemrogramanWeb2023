@extends('layouts.main')
<style>
    table {
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    tr td a {
        text-decoration: none;
        color: #000000;
        position: relative;
    }

    tr td a::after {
        content: '';
        height: 2px;
        width: 0;
        background: #000000;
        position: absolute;
        left: 0;
        bottom: -2px;
        transition: width 0.5s;
    }

    tr td a:hover::after {
        width: 100%;
    }

    .kepala {
        background-color: #222831;
    }
</style>
@section('container')
    <div class="d-flex flex-row-reverse mt-4">
        <a href="/product/create" class="btn btn-secondary">New Product</a>
    </div>
    <!-- mengecek apakah ada data sesi dengan kunci 'success'. Jika ada, data sesi tersebut akan disimpan dalam variabel $message. -->
    @if ($message = Session::get('success')) 
        <div class="alert alert-success alert-block mt-3">
            <!-- digunakan untuk menampilkan isi pesan sukses yang telah disimpan dalam variabel $message -->
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <table class="table table-bordered border-dark mt-4">
        <thead class="table-secondary align-middle">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-hover">
            @if ($products->count() > 0)
                @foreach ($products as $product)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle"><a href="product/{{ $product->id }}/show"
                                class="text-dark">{{ $product->nama }}</a></td>
                        <td class="align-middle">Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </td>
                        <td class="align-middle">{{ $product->jenis }}</td>
                        <td class="align-middle">
                            <img src="img/{{ $product->image }}" width="75" height="75" />
                        </td>
                        <td class="align-middle">
                            <a href="product/{{ $product->id }}/edit" class="btn btn-dark btn-sm"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></a>

                            <form class="d-inline" action="product/{{ $product->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="20" height="20" fill="currentColor" class="bi bi-x-square"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="6">Items Not Found</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
