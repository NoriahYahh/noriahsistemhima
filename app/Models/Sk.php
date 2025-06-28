<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sk extends Model
{
    
    protected $fillable = [
        'file',
        'keterangan',
        'user_id',
        'for_user_id'
    ];
    

    public function user(){
        return $this->belongsTo(User::class);
    }

   public function foruser()
{
    return $this->belongsTo(User::class, 'for_user_id');
}

}
