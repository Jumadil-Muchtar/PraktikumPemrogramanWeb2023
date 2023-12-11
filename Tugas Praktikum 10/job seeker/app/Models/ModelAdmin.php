<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
;
class ModelAdmin extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    use HasFactory;

    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'password',
        'name',
    ];

    public function isAdmin()
    {
        return true;
    }

    public function home()
    {
        return '/dashboardAdmin';
    }

}
