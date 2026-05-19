@extends('layouts.app')

@section('title', 'Katalog Produk - Batik Singhasari')

@section('content')

<!-- Page Header -->
<div class="py-5" style="background: linear-gradient(135deg, var(--batik-brown), var(--batik-dark)); color: white;">
    <div class="container">
        <h1 class="text-center mb-3"><i class="fas fa-shopping-bag"></i> Katalog Produk</h1>
        <p class="text-center lead">Koleksi Batik Khas Malang dengan Kualitas Terbaik</p>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-lg-3 mb-4">
                <div class="card card-batik">
                    <div class="card-body">
                        <h5 class="mb-3"><i class="fas fa-filter"></i> Filter Produk</h5>
                        
                        <form action="{{ route('katalog') }}" method="GET">
                            <!-- Search -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Cari Produk</label>
                                <input type="text" name="search" class="form-control" 
                                       placeholder="Nama produk..." 
                                       value="{{ request('search') }}">
                            </div>

                            <!-- Kategori -->
                            <div class="mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="">Semua Kategori</option>
                                    @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id_kategori }}" 
                                            {{ request('kategori') == $kat->id_kategori ? 'selected' : '' }}>
                                        {{ $kat->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-batik w-100">
                                <i class="fas fa-search"></i> Cari
                            </button>
                            
                            @if(request('search') || request('kategori'))
                            <a href="{{ route('katalog') }}" class="btn btn-outline-secondary w-100 mt-2">
                                <i class="fas fa-times"></i> Reset Filter
                            </a>
                            @endif
                        </form>

                        <!-- Kategori List -->
                        <hr class="my-4">
                        <h6 class="mb-3">Kategori Populer</h6>
                        <div class="list-group">
                            <a href="{{ route('katalog') }}" 
                               class="list-group-item list-group-item-action {{ !request('kategori') ? 'active' : '' }}">
                                <i class="fas fa-th"></i> Semua Produk
                            </a>
                            @foreach($kategoris as $kat)
                            <a href="{{ route('katalog', ['kategori' => $kat->id_kategori]) }}" 
                               class="list-group-item list-group-item-action {{ request('kategori') == $kat->id_kategori ? 'active' : '' }}">
                                <i class="fas fa-tag"></i> {{ $kat->nama_kategori }}
                                <span class="badge bg-secondary float-end">{{ $kat->produks->count() }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">
                        Menampilkan {{ $produks->count() }} dari {{ $produks->total() }} produk
                    </h5>
                </div>

                <div class="row">
                    @forelse($produks as $produk)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card card-batik h-100">
                            <div style="position: relative; overflow: hidden;">
                                @if($produk->foto_produk)
                                <img src="{{ asset('images/produk/' . $produk->foto_produk) }}" 
                                     class="card-img-top" 
                                     alt="{{ $produk->nama_produk }}"
                                     style="height: 280px; object-fit: cover;">
                                @else
                                <div style="height: 280px; background: var(--batik-cream); display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image fa-3x" style="color: var(--batik-brown);"></i>
                                </div>
                                @endif
                                
                                @if($produk->stok < 5)
                                <span class="badge bg-danger" style="position: absolute; top: 10px; right: 10px;">
                                    Stok Terbatas
                                </span>
                                @endif
                            </div>
                            
                            <div class="card-body d-flex flex-column">
                                <span class="badge-batik mb-2 align-self-start">
                                    {{ $produk->kategori->nama_kategori }}
                                </span>
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text text-muted small flex-grow-1">
                                    {{ Str::limit($produk->deskripsi, 80) }}
                                </p>
                                
                                <!-- Rating -->
                                @if($produk->reviews->count() > 0)
                                <div class="mb-2">
                                    <div class="star-rating">
                                        @php $avgRating = $produk->averageRating(); @endphp
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fas fa-star{{ $i <= $avgRating ? '' : ($i - $avgRating < 1 ? '-half-alt' : ' text-muted') }}"></i>
                                        @endfor
                                        <small class="text-muted ms-1">({{ $produk->reviews->count() }} ulasan)</small>
                                    </div>
                                </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="price-tag">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                    <small class="text-muted">Stok: {{ $produk->stok }}</small>
                                </div>
                                
                                <a href="{{ route('produk.detail', $produk->id_produk) }}" 
                                   class="btn btn-batik w-100">
                                    <i class="fas fa-eye"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            <i class="fas fa-info-circle"></i> Tidak ada produk yang ditemukan.
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $produks->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection