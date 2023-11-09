<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ProductController extends Controller
{


    public function index()
    {
        $products = product::all(); // Membaca semua data dari tabel "products"
        
        return view('index', ['product' => $products]);
    }
    public function details($id) {
        $product = product::find($id); // Membaca data berdasarkan ID
        
        if ($product) {
            return view('details', ['product' => $product]);
        } else {
            return redirect()->back()->with('error', 'Product tidak ditemukan');
        }
        
    }

    

    public function create()
    {
        return view('create');
    }
    public function simpanCreate(Request $request)
    {
        // Lakukan validasi data yang diterima dari formulir
        $adaProduct = product::where('nama', $request->input('nama'))->first();

        if ($adaProduct) {
            // Jika data dengan nama yang sama sudah ada, tampilkan pesan kesalahan
            return back()->with('error', 'Data dengan nama yang sama sudah ada. Silakan coba lagi.');
        }
        $product = new product;
        $product->nama = $request->input('nama');
        $product->merk = $request->input('merk');
        $product->storage = $request->input('storage');
        $product->ram = $request->input('ram');
        $product->harga = $request->input('harga');
        $product->save();
        return back()->with('success', 'Data Berhasil Ditambahkan');
        // return view('create');
    }
    
    public function update()
    {
        return view('update');
    }
    public function delete()
    {
        return view('delete');
    }
    public function simpanUpdate(Request $request)
    {   
        $productId = $request->input('id');
        $product = Product::find($productId); // Menggunakan metode find untuk mendapatkan objek yang sudah ada
        $adaProduct = Product::where('nama', $request->input('nama'))->first();

        if ($adaProduct) {
            // Jika data dengan nama yang sama sudah ada, tampilkan pesan kesalahan
            return back()->with('error', 'Data nama yang diinput sudah ada.');
        }else if (!$product) {
            return back()->with('error', 'Data dengan ID tidak ditemukan');
        }

        $product->nama = $request->input('nama');
        $product->merk = $request->input('merk');
        $product->storage = $request->input('storage');
        $product->ram = $request->input('ram');
        $product->harga = $request->input('harga');

        $product->save(); // Menyimpan perubahan pada objek yang sudah ada

        return back()->with('success', 'Produk berhasil diubah');

    }
    public function simpanDelete(Request $request)
    {   
        // $productId = new product;
        $productId = $request->input('id');
        
        $product = product::find($productId);

        if (!$product) {
            return back()->with('error', 'Data dengan ID tidak ditemukan');
        }else{
            $product->delete();
        } 
        return back()->with('success', 'Produk berhasil dihapus');
        // return view('delete');
    }

}
