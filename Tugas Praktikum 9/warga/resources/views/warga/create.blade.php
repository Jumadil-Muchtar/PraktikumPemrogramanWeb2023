@extends('welcome')
@section('content')
    <div class="container">
        <h1 style="margin-bottom: 10px">Tambah Data Baru</h1>
        <form action="/store" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" required>
            </div>

            <div class="mb-3">
                <label for="nokk" class="form-label">No. KK</label>
                <input type="text" name="no_kk" class="form-control" id="nokk" aria-describedby="emailHelp" required>
            </div>
           
            <label for="gender">Jenis Kelamin
            <select class="form-select" name="jenis_kelamin" id="gender" required>
                <option value="pilih jenis kelamin">Pilih Jenis Kelamin</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            </label><br><br>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" name="alamat" rows="5" id="alamat" required></textarea>
            </div>   
             
            <input type="submit" name="submit" class="btn" style="background-color: steelblue; color:white; width:80px; margin-bottom: 10px;" value="Simpan">
            <a class="btn btn-dark" style="width:80px; margin-bottom: 10px;" href="/index">Kembali</a>
        </form>
    </div>
   
@endsection 