<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        \App\Models\User::factory()->create([
            'name' => 'ADMIN',
            'password'=>bcrypt('1234'),
            'hak_akses'=>'ADMINISTRATOR'
        ]);
        \App\Models\profil::create([
            'nama_koperasi'=>'Subur Makmur',
            'logo'=>'koperasi-1.png',
            'alamat'=>'alamat',
            'telepon'=>'telepon',
            'ketua'=>'ketua',
            'wakil_ketua'=>'wakil_ketua',
            'sekertaris'=>'sekertaris',
            'bendahara'=>'bendahara',
        ]);
        \App\Models\kelompok_rekening::create([
            'nama_kelompok'=>'Activa'
        ]);
        \App\Models\kelompok_rekening::create([
            'nama_kelompok'=>'Hutang'
        ]);
        \App\Models\kelompok_rekening::create([
            'nama_kelompok'=>'Modal'
        ]);
        \App\Models\kelompok_rekening::create([
            'nama_kelompok'=>'Penghasilan'
        ]);
        \App\Models\kelompok_rekening::create([
            'nama_kelompok'=>'Biaya'
        ]);
    }
}
