<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pesanan';
    protected $fillable = ['pesanan_id', 'menu_id', 'jumlah'];
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
