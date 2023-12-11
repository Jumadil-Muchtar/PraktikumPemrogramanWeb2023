@extends('layouts.main') 
@section('container')
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card p-4 mt-5">
                <form method="POST" action="/product/store" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Barang :</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}"
                            placeholder="Masukkan nama barang">
                        @if ($errors->has('nama'))
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Harga Barang :</label>
                        <input type="text" class="form-control" name="harga" value="{{ old('harga') }}"
                            placeholder="Masukkan harga barang">
                        @if ($errors->has('harga'))
                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Kategori Barang :</label>
                        <select class="form-select" name="jenis">
                            <option></option>
                            <option value="Mobil">Mobil</option>
                            <option value="Mobil Listrik">Mobil Listrik</option>
                            <option value="Motor">Motor</option>
                            <option value="Motor Listrik">Motor Listrik</option>
                            <option value="Sepeda">Sepeda</option>
                            <option value="Sepeda Listrik">Sepeda Listrik</option>
                        </select>
                        @if ($errors->has('jenis'))
                            <span class="text-danger">{{ $errors->first('jenis') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Deskripsi :</label>
                        <textarea class="form-control" rows="4" name="deskripsi" placeholder="Masukkan deskripsi barang">{{ old('deskripsi') }}</textarea>
                        @if ($errors->has('deskripsi'))
                            <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                        @endif
                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Gambar Barang :</label>
                        <input type="file" class="form-control" name="image" placeholder="Masukkan gambar barang">
                        @if ($errors->has('image'))
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-secondary mt-4">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
