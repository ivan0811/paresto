<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;

class PesananController extends Controller
{
    function meja(){
        $meja = Meja::all();
        return view('meja')->with('meja', $meja);
    }
    
    function update_meja(){
    $meja = Meja::find(1);
        $meja->status = 'meja telah dipesan';
        $flight->save();
    }
    
}
