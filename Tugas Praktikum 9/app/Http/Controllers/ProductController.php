<?php

namespace App\Http\Controllers; // Namespace digunakan untuk mengelompokkan kelas-kelas yang memiliki fungsi terkait dalam sebuah aplikasi

use App\Models\Product; // Mengimpor kelas Product dari namespace App\Models
use Illuminate\Http\Request; // Mengimpor kelas Request dari namespace Illuminate\Http
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengembalikan tampilan Blade dengan nama 'index'
        return view('index', ['products'=> Product::latest()->paginate(5) ]); 
        // Product::latest() mengambil semua produk dari model Product dan mengurutkannya berdasarkan waktu pembuatan, dengan yang terbaru di atas
        // paginate(5) mengatur hasil query tersebut untuk ditampilkan dengan lima produk per halaman
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengembalikan tampilan Blade dengan nama 'create'
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // menangani HTTP request untuk menyimpan data produk baru yang dikirim melalui formulir
    {
        //validasi data
        $request->validate([ // untuk memastikan bahwa data yang dikirimkan melalui HTTP request memenuhi kriteria tertentu sebelum disimpan ke dalam database
            'nama' => 'required', // tidak boleh kosong
            'harga' => 'required',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,gif|max:10000' // field 'image' harus diisi, harus memiliki ekstensi file yang diizinkan (png, jpg, jpeg, gif), dan ukuran file tidak boleh melebihi 10 megabyte
        ]);

        //upload image
        $imageName = time().'.'.$request->image->extension(); // Membuat nama file gambar baru dengan menggabungkan timestamp saat ini (dengan menggunakan fungsi time()) dan ekstensi file gambar yang diunggah ($request->image->extension()). Ini bertujuan untuk memberikan nama unik agar tidak ada kesalahan saat menyimpan gambar.
        $request->image->move(public_path('img'), $imageName); // Memindahkan file gambar yang diunggah ke direktori public/img dalam proyek Laravel. Fungsi public_path('img') memberikan path lengkap ke direktori tersebut

        $product = new Product; // Membuat objek baru
        $product->image = $imageName; // Menetapkan nama file gambar yang telah dibuat ke properti image objek Product
        $product->nama = $request->nama; // Menetapkan nilai dari field 'nama' yang diterima melalui HTTP request ke properti nama objek Product
        $product->harga = $request->harga; // Menetapkan nilai dari field 'harga' yang diterima melalui HTTP request ke properti harga objek Product
        $product->jenis = $request->jenis; // Menetapkan nilai dari field 'jenis' yang diterima melalui HTTP request ke properti jenis objek Product
        $product->deskripsi = $request->deskripsi; // Menetapkan nilai dari field 'deskripsi' yang diterima melalui HTTP request ke properti deskripsi objek Product

        $product->save(); // Menyimpan objek Product yang telah diisi dengan data baru ke dalam tabel produk pada database

        return redirect()->route('product.index')->withSuccess('Product Telah Ditambahkan!'); // Mengarahkan pengguna kembali ke halaman indeks produk (product.index) setelah produk berhasil ditambahkan
    }

    /**
     * Display the specified resource.
     */
    public function show($id) // Metode ini menerima parameter $id yang merupakan identifikasi unik produk yang ingin ditampilkan, digunakan untuk menampilkan detail produk dengan ID tertentu
    {
        $product = Product::where('id', $id)->first(); // Mengambil data produk dari tabel produk dengan menggunakan Eloquent ORM, digunakan untuk membuat query yang mencari produk dengan ID yang sesuai
        return view('show', ['product' => $product]); // Mengembalikan tampilan Blade dengan nama 'show'. Data produk yang telah diambil dari database disertakan dalam array asosiatif
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) // Metode ini menerima parameter $id, yang merupakan identifikasi unik dari produk yang ingin diedit
    {
        $product = Product::where('id', $id)->first(); // Mengambil data produk dari tabel produk dengan menggunakan Eloquent ORM, digunakan untuk membuat query yang mencari produk dengan ID yang sesuai
        return view('edit', ['product' => $product]); // Mengembalikan tampilan Blade dengan nama 'edit'. Data produk yang telah diambil dari database disertakan dalam array asosiatif
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) // Metode ini menangani HTTP request untuk memperbarui data produk dengan ID tertentu
    {
        //validasi data
        $request->validate([ // memastikan bahwa data yang dikirimkan melalui HTTP request memenuhi kriteria tertentu sebelum disimpan ke dalam database
            'nama' => 'required', // Harus diisi, tidak boleh kosong
            'harga' => 'required',
            'jenis' => 'nullable',
            'deskripsi' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg,gif|max:10000' // field 'image' bersifat opsional dan jika diisi, harus memiliki ekstensi file yang diizinkan (png, jpg, jpeg, gif), dan ukuran file tidak boleh melebihi 10 megabyte.
        ]);

        $product = Product::where('id', $id)->first(); // mengambil data produk dari database berdasarkan ID yang diterima melalui parameter metode ($id)

        if(isset($request->image)){ // memeriksa apakah ada file gambar yang diunggah melalui HTTP request (diperiksa dengan isset($request->image))
            //upload image
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img'), $imageName);
            $product->image = $imageName;
        }

        $product->nama = $request->nama; // Menetapkan nilai field nama pada objek $product dengan nilai yang dikirimkan melalui HTTP request ($request->nama)
        $product->harga = $request->harga;
        $product->jenis = $request->jenis;
        $product->deskripsi = $request->deskripsi;

        $product->save(); // menyimpan perubahan data pada objek $product ke dalam database. Ini menggunakan metode save() yang disediakan oleh Eloquent ORM

        return redirect()->route('product.index')->withSuccess('Product Berhasil Diubah!'); // Setelah data produk berhasil diupdate dan disimpan ke database, pengguna akan diarahkan (redirect) ke halaman indeks produk ('product.index')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) 
    {
        $product =Product::where('id', $id)->first(); // mengambil data produk dari database berdasarkan ID yang diterima melalui parameter metode ($id)
        $product->delete(); // menghapus objek $product dari database. Ini menggunakan metode delete() yang disediakan oleh Eloquent ORM
        return back()->withSuccess('Produk Berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $jenis = $request->input('jenis'); // mengambil nilai dari input dengan nama 'jenis' yang dikirimkan melalui HTTP request menggunakan objek $request. Nilai ini merupakan kategori produk yang ingin dicari

        $products = Product::where('jenis', $jenis)->get(); // menggunakan Eloquent Query Builder untuk mengambil semua produk yang memiliki jenis yang sesuai dengan nilai yang diambil dari input pengguna

        return view('jenis', ['products' => $products]); // Setelah mendapatkan hasil pencarian, metode ini mengarahkan pengguna ke halaman dengan nama 'jenis' dan mengirimkan data produk yang sesuai ke dalam tampilan. 
        // ['products' => $products] adalah array asosiatif yang mengirimkan data produk ke tampilan dengan menggunakan nama variabel 'products'
    }
}
