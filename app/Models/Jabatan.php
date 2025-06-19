<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['nama',
        'user_id',];
    
    public function datapengurus(){
        return $this->hasMany(DataPengurus::class);
    } 
      public function proker()
    {
        return $this->belongsTo(Proker::class);
    }
      public function user()
    {
        return $this->belongsTo(User::class);
    }
}
