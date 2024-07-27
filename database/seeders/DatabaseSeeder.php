<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Karyawan::create([
            'foto' => 'user.png',
            'nama' => 'user',
            'username' => 'user',
            'role' => 'Tech lead',
            'password' => '$2y$12$RxQOcXP2oztYuScopcSmtOeq.jLi3OJd4T7mOgxtPMhF2Wrtkmua6', //(12345678)
            'no_telp' => 'user',

        ]);
    }
}
