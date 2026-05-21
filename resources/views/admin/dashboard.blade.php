@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard')

@section('content')

<div class="row g-4 mb-5">
    <div class="col-xl-3 col-md-6">
        <div class="card card-batik h-100 text-white" style="background: var(--batik-brown);">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-1 opacity-75">TOTAL PRODUK</p>
                        <h2 class="fw-bold mb-0">{{ $totalProduk }}</h2>
                    </div>
                    <i class="fas fa-box fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-batik h-100" style="background: var(--batik-gold); color: #5D4037;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-1 opacity-75">KATEGORI</p>
                        <h2 class="fw-bold mb-0">{{ $totalKategori }}</h2>
                    </div>
                    <i class="fas fa-tags fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-batik h-100 text-white" style="background: #198754;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-1 opacity-75">REVIEW</p>
                        <h2 class="fw-bold mb-0">{{ $totalReview }}</h2>
                    </div>
                    <i class="fas fa-star fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-batik h-100 text-white" style="background: #0d6efd;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-1 opacity-75">PROMO AKTIF</p>
                        <h2 class="fw-bold mb-0">{{ $totalPromo }}</h2>
                    </div>
                    <i class="fas fa-percentage fa-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card card-batik">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold text-batik">
                    <i class="fas fa-box me-2"></i> Produk Terbaru
                </h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    @foreach($recentProducts as $produk)
                    <div class="col-md-6">
                        <div class="d-flex border rounded card-batik">
                            @if($produk->foto_produk)
                                <img src="{{ asset('images/produk/'.$produk->foto_produk) }}" 
                                     style="width: 110px; height: 110px; object-fit: cover;" alt="">
                            @endif
                            <div class="p-3">
                                <h6 class="mb-1">{{ $produk->nama_produk }}</h6>
                                <small class="text-muted">{{ $produk->kategori->nama_kategori ?? '-' }}</small>
                                <p class="mb-1 fw-bold text-batik">Rp {{ number_format($produk->harga) }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card card-batik h-100">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-semibold text-batik">
                    <i class="fas fa-star me-2"></i> Review Terbaru
                </h5>
            </div>
            <div class="card-body">
                @foreach($recentReviews as $review)
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between">
                        <strong>{{ $review->nama }}</strong>
                        <span class="text-warning">@for($i=1; $i<=$review->rating; $i++) ★ @endfor</span>
                    </div>
                    <small class="text-muted">{{ $review->produk->nama_produk ?? '-' }}</small>
                    <p class="small mt-2">"{{ Str::limit($review->komentar, 85) }}"</p>
                    <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection