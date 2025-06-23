<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DaftarHima extends Model
{

   protected $fillable = [
    'nama',
    'nim',
    'prodi',        // Add this
    'jenkel',
    'pilihan1',
    'pilihan2',
    'file',
    'jabatan_id',
    'user_id',      // Change user_id to hima_id or vice versa
];

    public function jabatan(){
        return $this->belongsTo(jabatan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
