<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\ProfilToko;
use App\Models\Promo;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profil = ProfilToko::first();
        $kategoris = Kategori::withCount('produks')->get();
        $produks = Produk::with('kategori', 'reviews')->latest()->take(8)->get();
        $promos = Promo::active()->latest()->take(3)->get();

        return view('home', compact('profil', 'kategoris', 'produks', 'promos'));
    }

    public function katalog(Request $request)
    {
        $query = Produk::with('kategori', 'reviews');

        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('id_kategori', $request->kategori);
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('nama_produk', 'like', '%' . $request->search . '%');
        }

        $produks = $query->paginate(12);
        $kategoris = Kategori::all();

        return view('katalog', compact('produks', 'kategoris'));
    }

    public function detail($id)
    {
        $produk = Produk::with(['kategori', 'reviews'])->findOrFail($id);

        $relatedProducts = Produk::where('id_kategori', $produk->id_kategori)
            ->where('id_produk', '!=', $id)
            ->take(4)
            ->get();

        return view('detail', compact('produk', 'relatedProducts'));
    }

    public function storeReview(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'komentar' => 'required|string'
        ]);

        Review::create([
            'id_produk' => $id,
            'nama' => $request->nama,
            'rating' => $request->rating,
            'komentar' => $request->komentar
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas review Anda!');
    }

    public function tentang()
    {
        $profil = ProfilToko::first();

        return view('tentang', compact('profil'));
    }

    public function promo()
    {
        $promos = Promo::active()->latest()->paginate(6);

        return view('promo', compact('promos'));
    }
}