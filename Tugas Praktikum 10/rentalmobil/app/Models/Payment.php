<?php
// app/Models/Payment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['amount', 'status_payment', 'payment_date',];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
