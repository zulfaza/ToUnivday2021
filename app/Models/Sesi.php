<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;
    public function pakets()
    {
        return $this->hasMany(Paket::class);
    }
    public function progress()
    {
        return $this->hasMany(progress::class);
    }
}
