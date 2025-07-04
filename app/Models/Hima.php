<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hima extends Model
{
    protected $fillable = ['image','nama','visi','misi','alur','user_id','pendaftaran_dibuka'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function daftarHimas()
{
    return $this->hasMany(DaftarHima::class);
}
}
