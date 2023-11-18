@extends('welcome')

    @section('content')
       <div class="container">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>NIK</th>
                    <th>NO.KK</th>
                    <th>JENIS KELAMIN</th>
                    <th>ALAMAT</th>
                </tr>
                @foreach($alamat as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->nama}}</td>
                        <td>{{$a->nik}}</td>
                        <td>{{$a->no_kk}}</td>
                        <td>{{$a->jenis_kelamin}}</td>
                        <td>{{$a->alamat}}</td>      
                    </tr>
                @endforeach
            </table> 
            <a href="/" class="btn btn-dark" style="background-color: steelblue; color:#fff">Kembali</a>
        </div>
    @endsection   
    