<?php

namespace App\Http\Controllers;

use App\Models\MakeupProduct;
use Illuminate\Http\Request;

class MakeupProductController extends Controller
{
    public function index() //Mengambil semua produk makeup dari database
    {
        $makeupProducts = MakeupProduct::all();
        return view('index', compact('makeupProducts'));
    }

    public function create() //Menampilkan formulir untuk membuat produk makeup baru.
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $this->validateProductData($request); //untuk memastikan bahwa data yang masuk dari request valid berdasarkan aturan validas

        MakeupProduct::create($data); //membuat instance baru dari model MakeupProduct dan mengisinya dengan data yang telah divalidasi. Kemudian, menyimpan instance baru tersebut ke dalam database.

        return redirect()->route('makeup-products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(MakeupProduct $makeupProduct) //Menampilkan detail dari produk makeup tertentu.
    {
        return view('show', compact('makeupProduct'));
    }

    public function edit(MakeupProduct $makeupProduct) //Menampilkan formulir untuk mengedit produk makeup tertentu.
    {
        return view('edit', compact('makeupProduct'));
    }

    public function update(Request $request, MakeupProduct $makeupProduct)
    {
        $data = $this->validateProductData($request);

        $makeupProduct->update($data);

        return redirect()->route('makeup-products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(MakeupProduct $makeupProduct) //Menghapus produk makeup tertentu dari database
    {
        $makeupProduct->delete();

        return redirect()->route('makeup-products.index')->with('success', 'Produk berhasil dihapus.');
    }

    private function validateProductData(Request $request) //Menangani pengiriman formulir untuk memperbarui produk makeup yang sudah ada di database
    {
        return $request->validate([
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);
    }
}
