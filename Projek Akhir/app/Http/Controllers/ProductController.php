<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function homepage()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function product()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    public function productdetails($id)
    {
        $product = Product::findOrFail($id);
        return view('productdetails', compact('product'));
    }

    public function addproduct()
    {
        return view('seller.addproduct');
    }

    public function storeproduct(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:computer & accessories,books,shoes,figurines,musical instruments',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = Str::slug($request->input('nama')) . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/gambar_produk', $gambarName);
        } else {
            $gambarName = null;
        }

        // Menambah produk baru ke dalam database
        $product = new Product;
        $product->nama = $request->input('nama');
        $product->deskripsi = $request->input('deskripsi');
        $product->kategori = $request->input('kategori');
        $product->harga = $request->input('harga');
        $product->stok = $request->input('stok');
        $product->gambar = $gambarName;
        $product->save();

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect('Dashboard')->with('success', 'Produk berhasil ditambahkan');
    }

    public function editproduct($id)
    {
        $product = Product::findOrFail($id);
        return view('seller.editproduct', compact('product'));
    }

    public function updateproduct(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|in:computer & accessories,books,shoes,figurines,musical instruments',
            'harga' => 'required|numeric',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = Str::slug($request->input('nama')) . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('public/gambar_produk', $gambarName);
        } else {
            $gambarName = $request->input('old_gambar'); // Preserve the old image if no new image is uploaded
        }

        // Update data produk dalam database
        $product = Product::findOrFail($id);
        $product->nama = $request->input('nama');
        $product->deskripsi = $request->input('deskripsi');
        $product->kategori = $request->input('kategori');
        $product->harga = $request->input('harga');
        $product->stok = $request->input('stok');
        $product->gambar = $gambarName;
        $product->save();

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect('Dashboard')->with('success', 'Produk berhasil diperbarui');
    }

    public function deleteproduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect kembali ke halaman dashboard dengan pesan sukses
        return redirect('Dashboard')->with('success', 'Produk berhasil dihapus');
    }
}
