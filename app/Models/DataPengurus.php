<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPengurus extends Model
{
    // protected $fillable = ['nama', 'nrp', 'jabatan_id', 'periode', 'image', 'user_id'];
    protected $fillable = ['nama', 'nrp', 'jabatan_id', 'periode', 'image', 'user_id', 'is_alumni'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
