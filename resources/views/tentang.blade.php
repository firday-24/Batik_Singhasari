@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

<section class="py-5">

    <div class="container">

        <h1 class="section-title text-center mb-5">
            Tentang Batik Singhasari
        </h1>

        <div class="row align-items-center">

            <!-- Banner / Ilustrasi -->
            <div class="col-md-5 mb-4">

                <div class="bg-light rounded shadow p-5 text-center h-100 d-flex flex-column justify-content-center">

                    <div class="mb-4">
                        <i class="fas fa-palette fa-5x" style="color: var(--batik-gold);"></i>
                    </div>

                    <h3 class="mb-3">
                        Batik Khas Malang
                    </h3>

                    <p class="text-muted">
                        Warisan budaya Indonesia dengan sentuhan modern dan elegan.
                    </p>

                </div>

            </div>

            <!-- Konten -->
            <div class="col-md-7">

                @if($profil)

                    <h2 class="mb-3">
                        {{ $profil->nama_toko }}
                    </h2>

                    <p class="text-muted" style="text-align: justify;">
                        {{ $profil->deskripsi }}
                    </p>

                    <div class="mt-4">

                        <div class="mb-3">
                            <i class="fas fa-envelope me-2" style="color: var(--batik-brown);"></i>
                            {{ $profil->email }}
                        </div>

                        <div class="mb-3">
                            <i class="fab fa-whatsapp me-2" style="color: #25D366;"></i>
                            {{ $profil->whatsapp }}
                        </div>

                        <div class="mb-3">
                            <i class="fas fa-map-marker-alt me-2" style="color: var(--batik-brown);"></i>
                            {{ $profil->lokasi }}
                        </div>

                    </div>

                @else

                    <div class="alert alert-warning text-center">
                        Profil toko belum tersedia.
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection