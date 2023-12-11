<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTamu extends Model
{
    use HasFactory;

    protected $table = 'tamu';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
