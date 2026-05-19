@extends('layouts.app')

@section('title', $produk->nama_produk . ' - Batik Singhasari')

@section('content')

<!-- Breadcrumb -->
<div class="py-3" style="background-color: var(--batik-cream);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('katalog') }}">Katalog</a></li>
                <li class="breadcrumb-item active">{{ $produk->nama_produk }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-4">
                <div class="card card-batik">
                    @if($produk->foto_produk)
                    <img src="{{ asset('images/produk/' . $produk->foto_produk) }}" 
                         class="card-img-top" 
                         alt="{{ $produk->nama_produk }}"
                         style="max-height: 500px; object-fit: cover;">
                    @else
                    <div style="height: 500px; background: var(--batik-cream); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-image fa-5x" style="color: var(--batik-brown);"></i>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <span class="badge-batik mb-3">{{ $produk->kategori->nama_kategori }}</span>
                
                <h1 class="mb-3">{{ $produk->nama_produk }}</h1>

                <!-- Rating -->
                @if($produk->reviews->count() > 0)
                <div class="mb-3">
                    <div class="star-rating">
                        @php $avgRating = $produk->averageRating(); @endphp
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star{{ $i <= $avgRating ? '' : ' text-muted' }}"></i>
                        @endfor
                        <span class="ms-2 text-muted">{{ number_format($avgRating, 1) }} ({{ $produk->reviews->count() }} ulasan)</span>
                    </div>
                </div>
                @endif

                <h2 class="price-tag mb-4">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h2>

                <!-- Product Details -->
                <div class="card card-batik mb-4">
                    <div class="card-body">
                        <h5 class="mb-3"><i class="fas fa-info-circle"></i> Detail Produk</h5>
                        <table class="table table-borderless mb-0">
                            <tr>
                                <td width="150"><strong>Kategori</strong></td>
                                <td>: {{ $produk->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <td><strong>Stok</strong></td>
                                <td>: 
                                    @if($produk->stok > 10)
                                        <span class="badge bg-success">{{ $produk->stok }} pcs tersedia</span>
                                    @elseif($produk->stok > 0)
                                        <span class="badge bg-warning">{{ $produk->stok }} pcs (Terbatas)</span>
                                    @else
                                        <span class="badge bg-danger">Habis</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <h5 class="mb-3"><i class="fas fa-align-left"></i> Deskripsi</h5>
                    <p style="text-align: justify; line-height: 1.8;">
                        {{ $produk->deskripsi ?? 'Batik khas Malang dengan motif tradisional yang memiliki nilai filosofis tinggi. Dibuat dengan teknik dan bahan berkualitas untuk menjaga keaslian warisan budaya lokal.' }}
                    </p>
                </div>

                <!-- CTA Buttons -->
                @php
                    $profil = \App\Models\ProfilToko::first();
                    $waNumber = $profil && $profil->whatsapp ? preg_replace('/[^0-9]/', '', $profil->whatsapp) : '628123456789';
                    $waMessage = urlencode("Halo, saya tertarik dengan produk:\n\n*{$produk->nama_produk}*\nHarga: Rp " . number_format($produk->harga, 0, ',', '.') . "\n\nApakah produk ini masih tersedia?");
                @endphp

                <div class="d-grid gap-2">
                    <a href="https://wa.me/{{ $waNumber }}?text={{ $waMessage }}" 
                       class="btn btn-lg" 
                       style="background: linear-gradient(135deg, #25D366, #128C7E); color: white; border: none;"
                       target="_blank">
                        <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                    </a>
                    
                    <button type="button" class="btn btn-outline-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        <i class="fas fa-star"></i> Tulis Review
                    </button>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="section-title text-center mb-4">Review Pelanggan</h3>

                @if($produk->reviews->count() > 0)
                <div class="row">
                    @foreach($produk->reviews as $review)
                    <div class="col-md-6 mb-3">
                        <div class="card card-batik">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h6 class="mb-0">{{ $review->nama }}</h6>
                                    <div class="star-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $review->rating ? '' : ' text-muted' }}"></i>
                                        @endfor
                                    </div>
                                </div>
                                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
                                <p class="mt-2 mb-0">{{ $review->komentar }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="text-center text-muted">
                    <i class="fas fa-comment-slash fa-3x mb-3"></i>
                    <p>Belum ada review untuk produk ini. Jadilah yang pertama!</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="section-title text-center mb-4">Produk Terkait</h3>
                <div class="row">
                    @foreach($relatedProducts as $related)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card card-batik h-100">
                            @if($related->foto_produk)
                            <img src="{{ asset('images/produk/' . $related->foto_produk) }}" 
                                 class="card-img-top" 
                                 alt="{{ $related->nama_produk }}"
                                 style="height: 200px; object-fit: cover;">
                            @else
                            <div style="height: 200px; background: var(--batik-cream); display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-image fa-2x" style="color: var(--batik-brown);"></i>
                            </div>
                            @endif
                            <div class="card-body">
                                <h6 class="card-title">{{ $related->nama_produk }}</h6>
                                <p class="price-tag mb-2">Rp {{ number_format($related->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('produk.detail', $related->id_produk) }}" class="btn btn-batik btn-sm w-100">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold)); color: white;">
                <h5 class="modal-title"><i class="fas fa-star"></i> Tulis Review</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('review.store', $produk->id_produk) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Anda *</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Rating *</label>
                        <div class="rating-input">
                            <input type="radio" name="rating" value="5" id="star5" required>
                            <label for="star5"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" name="rating" value="4" id="star4">
                            <label for="star4"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" name="rating" value="3" id="star3">
                            <label for="star3"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" name="rating" value="2" id="star2">
                            <label for="star2"><i class="fas fa-star"></i></label>
                            
                            <input type="radio" name="rating" value="1" id="star1">
                            <label for="star1"><i class="fas fa-star"></i></label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Komentar *</label>
                        <textarea name="komentar" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-batik">
                        <i class="fas fa-paper-plane"></i> Kirim Review
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('extra-css')
<style>
.rating-input {
    display: flex;
    flex-direction: row-reverse;
    justify-content: flex-end;
    gap: 5px;
}

.rating-input input {
    display: none;
}

.rating-input label {
    font-size: 2rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.2s;
}

.rating-input input:checked ~ label,
.rating-input label:hover,
.rating-input label:hover ~ label {
    color: var(--batik-gold);
}
</style>
@endsection