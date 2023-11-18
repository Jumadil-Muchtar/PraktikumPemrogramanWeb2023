@extends('welcome')

@section('content')
   <div class="container">
        <a class="btn btn-primary mb-3" style="background-color: steelblue;" href="/create">Tambah Data</a>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>NAMA</th>
                <th>NIK</th>
                <th>NO. KK</th>
                <th>JENIS KELAMIN</th>
                <th>ALAMAT</th>
                <th>AKSI</th>
            </tr>
            @foreach($warga as $w)
                <tr>
                    <td>{{$w->id}}</td>
                    <td>{{$w->nama}}</td>
                    <td>{{$w->nik}}</td>
                    <td>{{$w->no_kk}}</td>
                    <td>{{$w->jenis_kelamin}}</td>
                    <td>{{$w->alamat}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-warning" href="/{{ $w->id }}/edit" style="width:100px">Edit</a>
                            <form action="/{{$w->id}}" method="POST">
                                <span class="mr-2" style="margin: 10px;">
                                    @csrf
                                    @method('delete')
                                    <input class="btn btn-danger" type="submit" value="Delete" style="width:100px">
                                </span>
                            </form>
                        </div>    
                    </td>       
                </tr>
            @endforeach
        </table>
    </div>
@endsection   
