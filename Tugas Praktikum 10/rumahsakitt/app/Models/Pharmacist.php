<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pharmacist extends Model
{
    use HasFactory ;
    protected $table = 'pharmacist';
    protected $fillable = ['name', 'phone', 'image'];
}
