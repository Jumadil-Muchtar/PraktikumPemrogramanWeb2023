<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelJob extends Model
{
    public $timestamps = false;
    protected $table = 'job';
    protected $primaryKey = 'id';
    protected $fillable = [
        'job_desc',
        'kategori',
        'gaji',
        'company',
        'tersedia',
        'email_company',
        'kontak_company',
        'logo_company',
        'soft_skill',
        'hard_skill',
        'desc_company',
    ];

    

}
