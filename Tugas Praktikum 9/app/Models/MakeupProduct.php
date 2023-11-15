<?php

// app/Models/MakeupProduct.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeupProduct extends Model //Ini menunjukkan bahwa kelas ini digunakan untuk berinteraksi dengan data dalam tabel makeup_products di database.
{

    protected $fillable = ['name', 'description', 'brand','price', 'stock'];
    use HasFactory;

   
}
