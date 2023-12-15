<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelApply extends Model
{
    use HasFactory;

    protected $table = 'Apply';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'id_job',
        'tgl_interview',
        'jam_interview',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function job()
    {
        return $this->belongsTo(modelJob::class, 'id_job');
    }

}
