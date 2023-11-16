<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    // Menampilkan semua produk
    public function index(Request $request)
    {
        $searchQuery = $request->input('search');  //kata kunci untuk pencarian
    
        $products = Product::when($searchQuery, function ($query) use ($searchQuery) {
            return $query->where('name', 'like', "%$searchQuery%")
                         ->orWhere('category', 'like', "%$searchQuery%");
            })
            ->paginate(8) //membagi hasil kueri produk menjadi halaman-halaman
            ->withQueryString(); //memastikan bahwa parameter pencarian dipertahankan dalam URL setiap kali pengguna berpindah halaman.

        return view('products.index', compact('products')); //untuk memasukkan variabel 'products' ke dalam tampilan
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:60000' // Validasi untuk file gambar
        ]);

        // Cek apakah ada file gambar yang diunggah
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $imageName);
        } else {
            $imageName = null; // Atau berikan nilai default jika tidak ada gambar diunggah
        }

        $product = new Product;
        $product->name = $request->name;
        $product->category = $request->category;
        $product->description = nl2br($request->description);
        $product->price = $request->price;
        $product->image = $imageName; // Atau null jika tidak ada gambar

        $product->save(); // Simpan produk ke dalam database

        return redirect()->route('products.index')->with('success','Product telah ditambahkan');
    }



    // Menampilkan detail produk
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
   
    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    // Mengupdate produk
    public function update(Request $request, $id)
    {
        //validasi data
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable',
            'description' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:60000'
        ]);

        $product = Product::where('id', $id)->first();

        if(isset($request->image)){
            //upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('products.index')->with('success','Product Berhasil Di Ubah!!!');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product has been deleted');
    }

    public function productsByCategory($category)
    {
        $products = Product::where('category', $category)->paginate(20);
        return view('products.index', compact('products'));
    }
}
