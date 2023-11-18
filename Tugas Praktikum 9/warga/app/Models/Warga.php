<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;
    protected $table = 'warga';
    // protected $fillable =['nama','nik',]
    protected $guarded = [];
    // protected $fillable = ['nama', 'nik', 'no_kk', 'jenis_kelamin', 'alamat'];
}
