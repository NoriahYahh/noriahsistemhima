<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    protected $table = 'pengumumans';
    
    protected $fillable = [
        'judul',
        'file',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}