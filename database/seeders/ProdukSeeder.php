<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'id_kategori' => 1,
            'nama_produk' => 'Batik Singhasari Premium',
            'deskripsi' => 'Batik khas Malang dengan motif elegan.',
            'harga' => 250000,
            'stok' => 10,
            'foto_produk' => 'https://img.lazcdn.com/g/ff/kf/Scc08b1e5436d4b47a5bc4b7e51fa0da1l.jpg_720x720q80.jpg'
        ]);
// jangan lupa ctrl + s yhh takut offline muluuu
        Produk::create([
            'id_kategori' => 2,
            'nama_produk' => 'Batik Malangan Modern',
            'deskripsi' => 'Desain modern cocok untuk anak muda.',
            'harga' => 180000,
            'stok' => 15,
            'foto_produk' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS6BpOmtNxtNcrOmiNFdhGXoFwGUlYhDE3hmw&s'
        ]);

        Produk::create([
            'id_kategori' => 3,
            'nama_produk' => 'Batik Nusantara',
            'deskripsi' => 'Perpaduan budaya lokal dan modern.',
            'harga' => 300000,
            'stok' => 8,
            'foto_produk' => null
        ]);
    }
}