@extends('mahasiswa.layouts.main')

@section('content') <!-- Memulai section 'content' -->
<!-- START FORM -->
<form action='{{ url('mahasiswa/'. $data->nim) }}'>
    @csrf
    @method('PUT')
    <div class="col-sm-1" style="margin-top:40px">
        <a href="{{ url('mahasiswa') }}" class="btn btn-danger mb-2"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
    </div>
    <div class="p-5 rounded shadow-md" style="background-color: #71AC9A">
        <h2 class="fw-bold mb-3">Edit Data</h2>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label fw-bold">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama" value="{{ $data->nama }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label fw-bold">Tanggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name='tanggal_lahir' id="tanggal_lahir" value="{{ $data->tanggal_lahir }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label fw-bold">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='alamat' id="alamat" value="{{ $data->alamat }}">
            </div>
        </div>    
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label fw-bold">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='jurusan' id="jurusan" value="{{ $data->jurusan }}">
            </div>
        </div>
        <div class="mb-3 row" style="margin-left: 162px">
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary" name="submit"><i class="fa-solid fa-floppy-disk fa-lg" style="color: #ffffff;"></i></button>
            </div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection <!-- Mengakhiri section 'content' -->
