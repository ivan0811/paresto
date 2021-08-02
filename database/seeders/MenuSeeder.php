<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            [
                'kategori_id' => 1,
                'nama' => 'Ramen',
                'harga' => 15000,
                'status' => 'tersedia',                
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Mie Ayam',
                'harga' => 10000,
                'status' => 'tersedia',                
            ],
            [
                'kategori_id' => 1,
                'nama' => 'Nasi Goreng Spesial',
                'harga' => 20000,
                'status' => 'tersedia',                
            ],
            [
                'kategori_id' => 2,
                'nama' => 'Jus Alpukat',
                'harga' => 5000,
                'status' => 'tersedia',                
            ],
            [
                'kategori_id' => 2,
                'nama' => 'Es Teh',
                'harga' => 3000,
                'status' => 'tersedia',                
            ]            
        ]);
    }
}
