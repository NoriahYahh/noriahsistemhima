<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proker extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_proker',
        'deskripsi',
        'jabatan_id',
        'periode',
        'user_id'
    ];

 /**
     * Get the jabatan that owns the program kerja.
     */
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    /**
     * Get the user that created the program kerja.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}