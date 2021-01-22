<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sesi()
    {
        return $this->belongsTo(Sesi::class);
    }
    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
