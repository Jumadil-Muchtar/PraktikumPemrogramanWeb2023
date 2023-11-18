@extends('welcome')
@section('content')
<div class="container">
    <h1 style="margin-bottom: 10px">Edit Data</h1>
    <form action="/{{$warga->id}}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="nama" aria-describedby="emailHelp" value="{{$warga->nama}}" required>
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" name="nik" class="form-control" id="nik" aria-describedby="emailHelp" value="{{$warga->nik}}" required>
        </div>

        <div class="mb-3">
            <label for="nokk" class="form-label">No. KK</label>
            <input type="text" name="no_kk" class="form-control" id="nokk" aria-describedby="emailHelp" value="{{$warga->no_kk}}" required>
        </div>
        
        <label for="gender">Jenis Kelamin
            <select class="form-select" name="jenis_kelamin" id="gender">
                <option value="pilih jenis kelamin" required>{{$warga->jenis_kelamin}}</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </label><br><br>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat Lengkap</label>
            <textarea class="form-control" name="alamat" rows="5" id="alamat" required>{{$warga->alamat}}</textarea>
        </div>  
          
        <input type="submit" name="submit" class="btn"  style="background-color: steelblue; color:white; width:80px; margin-bottom: 10px;" value="Update">
        <a class="btn btn-dark" style="width:80px; margin-bottom: 10px;" href="/index">Batal</a>
    </form>
</div>

@endsection 