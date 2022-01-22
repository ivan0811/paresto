<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    protected $fillable = ['no_meja', 'nama', 'status', 'jumlah'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'no_meja');
    }
        
}
