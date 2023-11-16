<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dota extends Model
{
    use HasFactory;

    protected $fillable = ['hero', 'role', 'type', 'ability', 'description', 'difficulty'];
}
