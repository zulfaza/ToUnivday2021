<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;
    public function options()
    {
        return $this->hasMany(Opsi::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function jenis()
    {
        return $this->belongsTo(Jenis::class);
    }
}
