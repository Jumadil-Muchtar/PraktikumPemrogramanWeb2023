@extends('mahasiswa.layouts.main')

@section('content')
<div class="p-5 rounded shadow-lg" style="background-color: #71AC9A; margin-top: 50px">
    <h2 class="fw-bold">All Data</h2>
    <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
        <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search" style="max-width: 30%">
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></button>
    </form>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th class="text-center align-middle">#</th>
                <th class="text-center align-middle">NIM</th>
                <th class="text-center align-middle">Nama</th>
                <th class="text-center align-middle">Jurusan</th>
                <th class="text-center align-middle">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $key => $item)
                <tr>
                    <td class="text-center align-middle">{{ $key + 1 }}</td>
                    <td class="text-center align-middle">{{ $item->nim }}</td>
                    <td class="text-center align-middle">{{ $item->nama }}</td>
                    <td class="text-center align-middle">{{ $item->jurusan }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ url('mahasiswa/'.$item->nim) }}" class="btn btn-info btn-sm"><i class="fa-solid fa-circle-info fa-lg"></i></a>
                        <a href="{{ url('mahasiswa/'.$item->nim.'/edit') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square fa-lg"></i></a>
                        <form onsubmit="return confirm('Yakin Akan Menghapus Data?')" class="d-inline" action="{{ url('mahasiswa/'. $item->nim) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
                @if ($key + 1 % 5 == 0) <!-- Tambahkan kondisi untuk menampilkan Previous dan Next setiap 5 data -->
                    <tr>
                        <td colspan="5">
                            <div class="text-center">
                                {{ $data->links() }}
                            </div>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="5">Tidak ada data mahasiswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ url('mahasiswa/create') }}" class="btn btn-primary"><i class="fa-solid fa-plus fa-lg" style="color: #ffffff;"></i></a>
    </div>
</div>
@endsection
