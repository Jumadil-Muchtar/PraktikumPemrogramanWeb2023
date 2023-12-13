<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'stock', 'image', 'user_id'];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}

