<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfilToko;

class ProfilTokoSeeder extends Seeder
{
    public function run(): void
    {
        ProfilToko::create([
            'nama_toko' => 'Batik Singhasari',
            'deskripsi' => 'Pusat batik khas Malang.',
            'kontak' => '08123456789',
            'lokasi' => 'Malang, Jawa Timur',
            'email' => 'info@batiksinghasari.com',
            'whatsapp' => '08123456789'
        ]);
    }
}