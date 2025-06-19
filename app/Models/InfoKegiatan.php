<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoKegiatan extends Model
{
    protected $fillable = ['nama', 'tanggal', 'keterangan', 'image',
        'user_id',];
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
