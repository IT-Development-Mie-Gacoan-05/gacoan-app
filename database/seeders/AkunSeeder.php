<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'id_pegawai' => '12345',
                'nama_lengkap' => 'SuperAdmin',
                'jabatan' => 'ceo',
                'divisi' => 'it',
                'email' => 'coba@gmail.com',
                'password' => 'coba123' 
            ],
            [
                'id_pegawai' => '45678',
                'nama_lengkap' => 'Admin',
                'jabatan' => 'head',
                'divisi' => 'it',
                'email' => 'coba2@gmail.com',
                'password' => 'coba123'
            ],
        ];
        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
