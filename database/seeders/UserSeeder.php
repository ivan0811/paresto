<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'id' => 1,
                'nama' => 'admin',
                'email' => 'admin@localhost.com',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'roles' => 'admin'
            ],
            [
                'id' => 2,
                'nama' => 'aras',
                'email' => 'aras@localhost.com',
                'username' => 'aras',
                'password' => Hash::make('12345678'),
                'roles' => 'koki'
            ],
            [
                'id' => 3,
                'nama' => 'ivan',
                'email' => 'ivan@localhost.com',
                'username' => 'ivan',
                'password' => Hash::make('12345678'),
                'roles' => 'kasir'
            ],
            [
                'id' => 4,
                'nama' => 'argya',
                'email' => 'argya@localhost.com',
                'username' => 'argya',
                'password' => Hash::make('12345678'),
                'roles' => 'pelayan'
            ],
            [
                'id' => 5,
                'nama' => 'tommy',
                'email' => 'tommy@localhost.com',
                'username' => 'tommy',
                'password' => Hash::make('12345678'),
                'roles' => 'kasir'
            ],
            [
                'id' => 6,
                'nama' => 'fiona',
                'email' => 'fiona@localhost.com',
                'username' => 'fiona',
                'password' => Hash::make('12345678'),
                'roles' => 'pelayan'
            ],
        ]);
    }
}
