<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoKegiatan extends Model
{
    protected $fillable = ['nama', 'tanggal', 'keterangan', 'image'];
}
