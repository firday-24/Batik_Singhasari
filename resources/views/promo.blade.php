@extends('layouts.app')

@section('title', 'Promo Batik Singhasari')

@section('content')
<section class="py-5">
    <div class="container">

        <h1 class="section-title text-center mb-5">
            Promo Terkini
        </h1>

        @if($promos->count() > 0)
            <div class="row">
                @foreach($promos as $promo)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-batik h-100 shadow-sm">
                        
                        @if($promo->gambar)
                            <img src="{{ asset('images/promo/' . $promo->gambar) }}" 
                                 class="card-img-top" 
                                 alt="{{ $promo->judul }}"
                                 style="height: 230px; object-fit: cover;">
                        @else
                            <div style="height: 230px; background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold)); 
                                        display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-gift fa-5x text-white opacity-75"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold">{{ $promo->judul }}</h5>
                            
                            <p class="card-text flex-grow-1">
                                {{ $promo->isi }}
                            </p>

                            <div class="mt-auto">
                                <small class="text-muted d-block">
                                    <i class="fas fa-calendar-alt me-1"></i>
                                    {{ $promo->tanggal_mulai->format('d M Y') }} 
                                    s/d 
                                    {{ $promo->tanggal_selesai->format('d M Y') }}
                                </small>
                                
                                @if($promo->is_active)
                                    <span class="badge bg-success mt-2">Promo Sedang Berlangsung</span>
                                @else
                                    <span class="badge bg-secondary mt-2">Promo Tidak Aktif</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $promos->links() }}
            </div>

        @else
            <div class="text-center py-5">
                <i class="fas fa-gift fa-6x text-muted mb-4"></i>
                <h4 class="text-muted">Belum Ada Promo Aktif Saat Ini</h4>
                <p class="text-muted">Promo menarik akan segera ditambahkan. Silakan cek kembali nanti.</p>
            </div>
        @endif

    </div>
</section>
@endsection