<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $data = Mahasiswa::orderBy('nim', 'asc');

        if (strlen($katakunci)) {
            $data = $data->where('nim', 'like', '%' . $katakunci . '%')
                ->orWhere('nama', 'like', '%' . $katakunci . '%')
                ->orWhere('jurusan', 'like', '%' . $katakunci . '%');
        }

        $data = $data->get();

        return view('mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa,nim',
            'nama' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jurusan' => 'required',
            // Validasi untuk tanggal lahir
        ], [
            'nim.required' => 'NIM Wajib Diisi',
            'nim.unique' => 'NIM Telah Terpakai',
            'nama.required' => 'Nama Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'tanggal_lahir.date' => 'Format Tanggal Lahir Tidak Valid',
            'alamat.required' => 'Tanggal Lahir Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',
        ]);

        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
            'alamat' => $request->alamat,
        ];

        Mahasiswa::create($data);
        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();
        return view('mahasiswa.edit', compact('data'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
        ], [
            'nama.required' => 'Nama Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
            'jurusan.required' => 'Jurusan Wajib Diisi',


        ]);

        $data = [
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'jurusan' => $request->jurusan,
        ];

        Mahasiswa::where('nim', $nim)->update($data);
        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Update Data');
    }

    public function destroy($nim)
    {
        Mahasiswa::where('nim', $nim)->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Berhasil Delete Data');
    }

    public function show($nim)
    {
        $data = Mahasiswa::where('nim', $nim)->first();

        if (!$data) {
            return redirect()->route('mahasiswa.index')->with('error', 'Data Mahasiswa tidak ditemukan');
        }

        return view('mahasiswa.details', compact('data'));
    }
}
