<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['no_meja', 'pegawai_id', 'no_antrian', 'status'];
    
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }
    
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
    
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
        
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
