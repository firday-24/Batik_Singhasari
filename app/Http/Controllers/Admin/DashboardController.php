<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Review;
use App\Models\Promo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalProduk = Produk::count();
        $totalKategori = Kategori::count();
        $totalReview = Review::count();
        $totalPromo = Promo::active()->count();
        
        $recentProducts = Produk::with('kategori')->latest()->take(5)->get();
        $recentReviews = Review::with('produk')->latest()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'totalProduk', 
            'totalKategori', 
            'totalReview', 
            'totalPromo',
            'recentProducts',
            'recentReviews'
        ));
    }
}