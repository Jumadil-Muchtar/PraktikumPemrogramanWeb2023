@extends('layout.template')
<!-- START FORM -->
@section('konten') 

<form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
@csrf 
@method('PUT')
<div class="p-5 rounded shadow-sm" style="margin-top: 60px; background-color: #71AC9A">
    <div class="mb-3 row">
        <h2 class="fw-bold">Edit </h2>
    </div>
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}" id="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name='tanggal_lahir' value="{{ $data->tanggal_lahir }}" id="tanggal_lahir">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}" id="alamat">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name='jurusan' value="{{ $data->jurusan }}" id="jurusan">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jurusan" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
            <a href='{{ url('mahasiswa') }}' class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
            <button type="submit" class="btn btn-primary" name="submit" class="btn btn-danger btn-md"><i class="fa-solid fa-floppy-disk fa-lg" style="color: #ffffff;"></i></button>        </div>
        </div>
    </div>
</div>
</form>
<!-- AKHIR FORM -->
@endsection