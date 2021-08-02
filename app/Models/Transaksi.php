<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['kd_transaksi', 'pegawai_id', 'pesanan_id', 'total_bayar'];    
    
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
