<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $fillable = ['user_id', 'jadwal_id', 'nama', 'asal', 'tujuan', 'tanggal', 'penumpang', 'catatan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
