<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $fillable = ['name', 'gender', 'origin', 'birth', 'year', 'treatment', 'phone', 'image'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
