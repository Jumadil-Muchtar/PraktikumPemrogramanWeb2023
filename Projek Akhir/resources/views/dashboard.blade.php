@extends('layouts.main2')

@section('content')

@section('header')
    Products
@endsection

<div class="col" style="margin:0 auto;">
    <div class="card">
        <div class="dashboard mt-3 ml-4 mb-2 mr-3">
            <div class="card-body table-responsive p-0" style="height: 600px; width:auto; margin: 0 20px" >
                <a href="/addproduct" class="btn btn-success mb-3">Tambah Produk</a>
                <table class="table table-head-fixed table-bordered mt-2 mb-4" id="example1" style="width: 100%; table-layout: fixed;">
                    <thead>
                        <tr>
                            <th style="width: 60px;">ID</th>
                            <th style="width: 150px;">Nama</th>
                            <th style="width: 200px;">Deskripsi</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Gambar</th>
                            <th style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->deskripsi}}</td>
                            <td>{{$row->kategori}}</td>
                            <td>Rp. {{$row->harga}}</td>
                            <td>{{$row->stok}}</td>
                            <td style="text-align: center; width: 200px;">
                                <img src="{{ asset('storage/gambar_produk/' . $row->gambar) }}" alt="Gambar Produk" style="width: 100%; height: auto; display: block; margin: 0 auto;">
                            </td>
                            <td style="text-align: center;">
                                <a href="{{ url('/editproduct/' . $row->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$row->id}}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{$row->id}}">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this product?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="/deleteproduct/{{$row->id}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
