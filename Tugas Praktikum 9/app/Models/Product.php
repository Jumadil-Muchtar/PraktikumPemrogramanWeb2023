<?php

namespace App\Models; // Kelas Product berada dalam namespace App\Models. Namespace digunakan untuk mengelompokkan kelas-kelas dalam sebuah aplikasi.

use Illuminate\Database\Eloquent\Factories\HasFactory; //  use statements digunakan untuk mengimpor HasFactory
use Illuminate\Database\Eloquent\Model; // use statements digunakan untuk mengimpor Model class

class Product extends Model // kelas Product turunan dari kelas Model
{
    use HasFactory; // digunakan untuk membantu dalam pembuatan factories atau seeders (penanam data) untuk model. Factory digunakan untuk membuat data dummy saat melakukan pengujian atau mengisi basis data dengan data uji

    protected $guarded =['id']; // digunakan untuk menentukan kolom-kolom yang tidak diizinkan untuk diisi secara massal (mass assignment)
}