<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    protected $fillable = ['no_meja', 'status', 'jumlah'];

    public function meja()
    {
        return $this->hasMany(Meja::class);
    }
}
