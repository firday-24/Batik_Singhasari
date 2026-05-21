<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\ProfilTokoController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\ReviewController;

// CUSTOMER
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog', [HomeController::class, 'katalog'])->name('katalog');
Route::get('/produk/{id}', [HomeController::class, 'detail'])->name('produk.detail');
Route::post('/produk/{id}/review', [HomeController::class, 'storeReview'])->name('review.store');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/promo', [HomeController::class, 'promo'])->name('promo');

// AUTH
Auth::routes();

// ADMIN
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('kategori', KategoriController::class);
    Route::resource('produk', ProdukController::class);

    Route::get('/profil', [ProfilTokoController::class, 'index'])->name('profil.index');
    Route::get('/profil/edit', [ProfilTokoController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilTokoController::class, 'update'])->name('profil.update');

    Route::resource('promo', PromoController::class);
    Route::post('/promo/{id}/toggle', [PromoController::class, 'toggleActive'])->name('promo.toggle');

    Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::post('/kontak', [HomeController::class, 'kirimPesan'])->name('kontak.kirim');
});