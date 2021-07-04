<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pegawai::insert([
            [
                'user_id' => 2,
                'alamat' => 'pekanbaru',
                'no_telp' => '089343456545',
                'jk' => 'L',
            ],
            [
                'user_id' => 3,
                'alamat' => 'kuningan',
                'no_telp' => '089343456545',
                'jk' => 'L',
            ],
            [
                'user_id' => 4,
                'alamat' => 'palembang',
                'no_telp' => '089343456545',
                'jk' => 'L',
            ],
            [
                'user_id' => 5,
                'alamat' => 'Bandung',
                'no_telp' => '089343456545',
                'jk' => 'L',
            ],
            [
                'user_id' => 6,
                'alamat' => 'padang',
                'no_telp' => '089343456545',
                'jk' => 'P',
            ]
        ]);
    }
}
