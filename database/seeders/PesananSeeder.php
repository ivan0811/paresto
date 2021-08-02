<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pesanan::insert([
            [
                'no_meja' => 1,
                'pegawai_id' => 4,
                'no_antrian' => 1,
                'status' => 'selesai',                
            ],            
            [
                'no_meja' => 7,
                'pegawai_id' => 4,
                'no_antrian' => 2,
                'status' => 'diproses',                
            ],            
            [
                'no_meja' => 10,
                'pegawai_id' => 4,
                'no_antrian' => 3,
                'status' => 'diproses',                
            ],            
            [
                'no_meja' => 12,
                'pegawai_id' => 4,
                'no_antrian' => 4,
                'status' => 'menunggu',                
            ]            
        ]);
    }
}
