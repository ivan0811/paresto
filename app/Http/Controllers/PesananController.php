<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meja;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\DetailPesanan;

class PesananController extends Controller
{
    function meja(){        
        return response()->json(Meja::with('pesanan')->get());
    }
    
    function updateMeja(Request $req, $no_meja){
        Meja::where('no_meja', $no_meja)
        ->update([
            'status' => $req->status,
            'nama' => $req->nama
        ]);        
        return response()->json(['status' => true]);
    }    
    
    public function show(){     
        // Pesanan::join('detail_pesanan', 'detail_pesanan.id', '=', 'pesanan.id')
        // ->join('menu', 'menu.id', '=', 'detail_pesanan.menu_id')                        
        // ->selectRaw('detail_pesanan.*, menu.harga * detail_pesanan.jumlah as total_harga')        
        // ->get()        
        return response()->json(Pesanan::with('detailPesanan.menu')->with('pegawai.user')->get());
    }

    public function updateStatus(Request $req, $id){
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $req->status;
        $pesanan->save();
        return response()->json(['status' => true]);
    }

    public function store(Request $req){        
        $pegawai_id = $req->user()->pegawai[0]->id;        

        $pesanan = Pesanan::all();
        
        $no_antrian = 0;
        if(count($pesanan) > 0){
            $no_antrian = $pesanan->whereNotIn('status', ['selesai', 'habis'])            
            ->sortBy([['no_antrian', 'desc']])
            ->first();
            
            if(!is_null($no_antrian)){
                $no_antrian = $no_antrian->no_antrian;          
            }else{
                $no_antrian = 1;
            }
        }                                    

        $pesanan = new Pesanan();
        $pesanan->no_meja = $req->no_meja;
        $pesanan->pegawai_id = $pegawai_id;
        $pesanan->no_antrian = $no_antrian++;
        $pesanan->status = 'menunggu';
        $pesanan->save();
        
        
        foreach ($req->pesanan as $key => $value) {                        
            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $value['id'],
                'jumlah' => $value['count']
            ]);
        }

        return response()->json(['status' => true]);        
    }

    public function edit($id){
        return response()->json(Pesanan::with('detailPesanan.menu')->where('id', $id)->get());
    }

    public function update(Request $req, $id){
        $pegawai_id = $req->user()->pegawai[0]->id;        

        $pesanan = Pesanan::all();
        
        $no_antrian = 0;
        if(count($pesanan) > 0){
            $no_antrian = $pesanan->whereNotIn('status', ['selesai', 'habis'])
            ->sortBy([['no_antrian', 'desc']])
            ->first()
            ->no_antrian;            
            if(!is_null($no_antrian)){
                $no_antrian = $no_antrian->no_antrian;          
            }else{
                $no_antrian = 1;
            }                                
        }                    

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->no_meja = $req->no_meja;
        $pesanan->pegawai_id = $pegawai_id;
        $pesanan->no_antrian = $no_antrian++;
        $pesanan->status = 'menunggu';
        $pesanan->save();

        DetailPesanan::where('pesanan_id', $id)->delete();              
        
        foreach ($req->pesanan as $key => $value) {                        
            DetailPesanan::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $value['id'],
                'jumlah' => $value['count']
            ]);
        }

        return response()->json(['status' => 'success']);
    }
    
    public function destroy($id){
        Pesanan::findOrFail($id)->delete();
        return response()->json(['status' => 'success']);
    }

    public function updateStatusPesananMenu(Request $req){                                    
        foreach ($req->id as $key => $value) {
            DetailPesanan::where('menu_id', $value)->with(array('pesanan' => function($query){
                $query->whereIn('status', ['diproses', 'menunggu'])
                ->update([
                    'status' => 'habis'
                ]);
            }))->get();
        }        
        return response()->json(['status' => true]);
    }
}
