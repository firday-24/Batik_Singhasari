<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Batik Tulis',
            'deskripsi' => 'Batik tulis khas Malang'
        ]);

        Kategori::create([
            'nama_kategori' => 'Batik Cap',
            'deskripsi' => 'Batik cap modern'
        ]);

        Kategori::create([
            'nama_kategori' => 'Batik Kombinasi',
            'deskripsi' => 'Perpaduan batik tradisional dan modern'
        ]);
    }
}