<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'car_id',
        'has_driver',
        'sim_image',
        'ktp_image',
        'payment_proof',
        // Add other fields as needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationships
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
