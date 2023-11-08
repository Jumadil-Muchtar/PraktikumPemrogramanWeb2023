@extends('layout.template')
@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2 class="text-center fw-bold">Detail Mahasiswa</h2>
    <hr class="border border-dark border-2 opacity-50">
    <center><img src="{{ url('image/PP.jpeg') }}" alt="" style="max-height: 300px; max-width: 300px"></center>
    <hr class="border border-dark border-2 opacity-50">
    <div class="container p-3">
        <table class="table">
            <tbody>
                <tr>
                    <td class="fw-bold">NIM</td>
                    <td>:</td>
                    <td>{{ $data->nim }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Nama</td>
                    <td> : </td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Tanggal Lahir</td>
                    <td> : </td>
                    <td>{{ date('d F Y', strtotime($data->tanggal_lahir)) }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Alamat</td>
                    <td> : </td>
                    <td>{{ $data->alamat }}</td>
                </tr>
                <tr>
                    <td class="fw-bold">Jurusan</td>
                    <td> : </td>
                    <td>{{ $data->jurusan }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ url('mahasiswa') }}" class="btn btn-danger btn-md"><i class="fa-solid fa-arrow-left fa-lg" style="color: #ffffff;"></i></a>
    </div>
    
</div>
@endsection