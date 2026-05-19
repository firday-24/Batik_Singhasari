<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Promo;

class PromoSeeder extends Seeder
{
    public function run(): void
    {
        Promo::create([
            'judul' => 'Diskon Hari Batik',
            'isi' => 'Diskon hingga 30% untuk semua produk batik.',
            'tanggal_mulai' => now(),
            'tanggal_selesai' => now()->addDays(30),
            'is_active' => true
        ]);
    }
}