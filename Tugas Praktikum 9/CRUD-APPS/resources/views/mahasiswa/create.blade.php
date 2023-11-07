@extends('mahasiswa.layouts.main')

@section('content') <!-- Memulai section 'content' -->
<!-- START FORM -->
<form action='{{ url('mahasiswa') }}' method='post' style="margin-top:10px">
    @csrf
    <a href="{{ url('mahasiswa') }}" class="btn btn-danger btn-sm"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
    <div class="mt-3 p-3 rounded shadow-sm" style="background-color: #71AC9A">
        <div class="header">
            <h2 class="mb-2 fw-bold">Form Data</h2>
        </div>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nim' id="nim" value="{{ Session::get('nim') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama" value="{{ Session::get('nama') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal_lahir' id="tanggal_lahir" value="{{ Session::get('tanggal_lahir') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' id="alamat" value="{{ Session::get('alamat') }}">
            </div>
        </div>            
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jurusan' id="jurusan" value="{{ Session::get('jurusan') }}">
            </div>
        </div>
        <div class="mb-3">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary btn-md" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection <!-- Mengakhiri section 'content' -->
