<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pesanan;
use Carbon\Carbon;
use App\Models\User;

class TransaksiController extends Controller
{
    public function show(){
        return response()->json(Pesanan::with('detailPesanan.menu')->with('transaksi')->where('status', 'selesai')->get());
    }
    
    public function store(Request $req){
        $pegawai_id = $req->user()->pegawai[0]->id;  

        Carbon::setLocale('id');        
        $transaksi = Transaksi::all();
        $kd_transaksi = 'tr'.Carbon::now()->format('dmyH');  
        if(count($transaksi) > 0){
            foreach ($transaksi as $key => $value) {
                if(preg_match('/'.$kd_transaksi.'/i', $value->kd_transaksi)){
                    $tempKd_transaksi = (int)substr($value->kd_transaksi, 10);
                    $tempKd_transaksi += 1;
                    if(strlen(strval($tempKd_transaksi)) == 1){
                        $tempKd_transaksi = '000'.strval($tempKd_transaksi);
                    }else if(strlen(strval($tempKd_transaksi)) == 2){
                        $tempKd_transaksi = '00'.strval($tempKd_transaksi);
                    }else if(strlen(strval($tempKd_transaksi)) == 3){
                        $tempKd_transaksi = '0'.strval($tempKd_transaksi);
                    }else{
                        $tempKd_transaksi = strval($tempKd_transaksi);
                    }
                    $kd_transaksi .= $tempKd_transaksi++;
                }else{
                    $kd_transaksi .= "0001";
                }
            }
        }else{
            $kd_transaksi .= "0001";
        }
        Transaksi::create([
            'kd_transaksi' => $kd_transaksi,
            'pegawai_id' => $pegawai_id,
            'pesanan_id' => $req->pesanan_id,
            'total_bayar' => $req->total_bayar
        ]);                        
        return response()->json(['status' => true]);
    }

    public function destroy($id){

    }
}
