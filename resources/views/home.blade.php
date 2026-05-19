@extends('layouts.app')

@section('title', 'Batik Singhasari - Batik Khas Malang')

@section('content')

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold mb-3" data-aos="fade-up">Batik Singhasari</h1>
        <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">
            Warisan Budaya Batik Khas Malang dalam Sentuhan Modern
        </p>
        <div data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('katalog') }}" class="btn btn-batik btn-lg me-2">
                <i class="fas fa-shopping-bag"></i> Lihat Katalog
            </a>
            <a href="{{ route('tentang') }}" class="btn btn-outline-light btn-lg">
                <i class="fas fa-info-circle"></i> Tentang Kami
            </a>
        </div>
    </div>
</section>

<!-- Promo Section -->
@if($promos->count() > 0)
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Promo Terkini</h2>
        <div class="row">
            @foreach($promos as $promo)
            <div class="col-md-4 mb-4">
                <div class="card card-batik">
                    @if($promo->gambar)
                    <img src="{{ asset('images/promo/' . $promo->gambar) }}" class="card-img-top" alt="{{ $promo->judul }}">
                    @else
                    <div style="height: 200px; background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold)); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-gift fa-4x text-white"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $promo->judul }}</h5>
                        <p class="card-text">{{ Str::limit($promo->isi, 100) }}</p>
                        <p class="text-muted small">
                            <i class="fas fa-calendar"></i> 
                            {{ $promo->tanggal_mulai->format('d M') }} - {{ $promo->tanggal_selesai->format('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('promo') }}" class="btn btn-batik">
                Lihat Semua Promo <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Kategori Section -->
<section class="py-5 bg-white">
    <div class="container">
        <h2 class="section-title text-center">Kategori Batik</h2>
        <div class="row justify-content-center">
            @foreach($kategoris as $kategori)
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('katalog', ['kategori' => $kategori->id_kategori]) }}" class="text-decoration-none">
                    <div class="card card-batik text-center">
                        <div class="card-body">
                            <div style="font-size: 3rem; color: var(--batik-gold);">
                                <i class="fas fa-{{ $loop->first ? 'paint-brush' : ($loop->last ? 'stamp' : 'palette') }}"></i>
                            </div>
                            <h5 class="mt-3">{{ $kategori->nama_kategori }}</h5>
                            <p class="text-muted small">{{ $kategori->produks_count }} Produk</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Produk Terbaru -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center">Koleksi Terbaru</h2>
        <div class="row">
            @forelse($produks as $produk)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card card-batik h-100">
                    @if($produk->foto_produk)
                    <img src="{{ asset('images/produk/' . $produk->foto_produk) }}" class="card-img-top" alt="{{ $produk->nama_produk }}">
                    @else
                    <div style="height: 250px; background: var(--batik-cream); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-image fa-3x" style="color: var(--batik-brown);"></i>
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <span class="badge-batik mb-2 align-self-start">{{ $produk->kategori->nama_kategori }}</span>
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text text-muted small flex-grow-1">{{ Str::limit($produk->deskripsi, 60) }}</p>
                        
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="price-tag">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                            @if($produk->reviews->count() > 0)
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star{{ $i <= $produk->averageRating() ? '' : '-o' }}"></i>
                                @endfor
                                <small class="text-muted">({{ $produk->reviews->count() }})</small>
                            </div>
                            @endif
                        </div>
                        
                        <a href="{{ route('produk.detail', $produk->id_produk) }}" class="btn btn-batik w-100">
                            <i class="fas fa-eye"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada produk.</p>
            </div>
            @endforelse
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('katalog') }}" class="btn btn-batik btn-lg">
                Lihat Semua Produk <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--batik-brown), var(--batik-dark)); color: white;">
    <div class="container text-center">
        <h2 class="mb-3">Tertarik dengan Batik Kami?</h2>
        <p class="lead mb-4">Hubungi kami melalui WhatsApp untuk informasi lebih lanjut dan pemesanan</p>
        @if(isset($profil) && $profil->whatsapp)
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profil->whatsapp) }}" 
           class="btn btn-lg" 
           style="background-color: #25D366; color: white;" 
           target="_blank">
            <i class="fab fa-whatsapp"></i> Hubungi via WhatsApp
        </a>
        @endif
    </div>
</section>

@endsection