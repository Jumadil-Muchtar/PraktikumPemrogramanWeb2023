@extends('layout.template')
<!-- START DATA -->
@section('konten')    
<div class="p-5 rounded shadow-sm" style="margin-top: 20px; background-color: #71AC9A">
    <div class="pb-2">
        <h2 class="fw-bold">Data</h2>
    </div>
    <!-- FORM PENCARIAN -->
    <div class="pb-2">
        <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
            <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
            <button class="btn btn-dark" type="submit">Cari</button>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1 text-center align-middle">No</th>
                <th class="col-md-3 text-center align-middle">NIM</th>
                <th class="col-md-4 text-center align-middle">Nama</th>
                <th class="col-md-2 text-center align-middle">Jurusan</th>
                <th class="col-md-2 text-center align-middle">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)
            <tr>
                <td class="text-center align-middle">{{ $i }}</td>
                <td class="text-center align-middle">{{ $item->nim }}</td>
                <td class="text-center align-middle">{{ $item->nama }}</td>
                <td class="text-center align-middle">{{ $item->jurusan }}</td>
                <td class="text-center align-middle">
                    <a href='{{ url('mahasiswa/'.$item->nim) }}' class="btn btn-info btn-sm"><i class="fa-solid fa-circle-info fa-lg"></i></a>
                    <a href="{{ url('mahasiswa/'.$item->nim.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                    <form onsubmit="return confirm('Yakin akan menghapus data?')" class='d-inline' action="{{ url('mahasiswa/'.$item->nim) }}" method="post">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash fa-lg"></i></button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
                <!-- TOMBOL TAMBAH DATA -->
        </tbody>
    </table>
    <div class="pb-2">
        <a href='{{ url('mahasiswa/create') }}' class="btn btn-primary"><i class="fa-solid fa-plus fa-lg" style="color: #ffffff;"></i></a>
    </div>
    {{ $data->withQueryString()->links() }}
</div>
<!-- AKHIR DATA -->
@endsection
    