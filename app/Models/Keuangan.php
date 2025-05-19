<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
  
    use HasFactory;

    protected $table = 'keuangans';
    
    protected $fillable = [
        'uang',
        'tanggal',
        'jenis',
        'user_id',
    ];

    /**
     * Get the user that owns the finance record
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Format nominal as currency
     */
    public function getFormattedUangAttribute()
    {
        return 'Rp ' . number_format($this->uang, 0, ',', '.');
    }
    
    /**
     * Get saldo based on all transactions
     */
    public static function getSaldo()
    {
        $masuk = self::where('jenis', 'masuk')->sum('uang');
        $keluar = self::where('jenis', 'keluar')->sum('uang');
        
        return $masuk - $keluar;
    }
}
