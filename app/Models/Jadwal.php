<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        'rute',
        'jam_keberangkatan',
        'harga',
    ];
}
