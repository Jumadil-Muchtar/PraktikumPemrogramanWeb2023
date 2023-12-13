<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'car_type',
        'price_per_hour',
        'number_license',
        'car_image',
        // Tambahkan field lain jika diperlukan
    ];
    // Definisikan hubungan atau relasi jika diperlukan
}
