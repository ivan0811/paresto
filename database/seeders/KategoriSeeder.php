<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::insert([
            [
                'id' => 1,
                'nama' => 'makanan'
            ],
            [
                'id' => 2,
                'nama' => 'minuman'
            ],
            [
                'id' => 3,
                'nama' => 'cemilan'
            ],
            [
                'id' => 4,
                'nama' => 'tambahan'
            ],
        ]);

    }
}
