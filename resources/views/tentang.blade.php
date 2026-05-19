@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

<section class="py-5">

    <div class="container">

        <h1 class="section-title text-center">
            Tentang Batik Singhasari
        </h1>

        <div class="row align-items-center">

            <div class="col-md-6 mb-4">

                <img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518"
                     class="img-fluid rounded shadow"
                     alt="Batik">

            </div>

            <div class="col-md-6">

                @if($profil)

                    <h2 class="mb-3">
                        {{ $profil->nama_toko }}
                    </h2>

                    <p>
                        {{ $profil->deskripsi }}
                    </p>

                    <div class="mt-4">

                        <p>
                            <i class="fas fa-envelope"></i>
                            {{ $profil->email }}
                        </p>

                        <p>
                            <i class="fab fa-whatsapp"></i>
                            {{ $profil->whatsapp }}
                        </p>

                        <p>
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $profil->lokasi }}
                        </p>

                    </div>

                @else

                    <div class="alert alert-warning">
                        Profil toko belum tersedia.
                    </div>

                @endif

            </div>

        </div>

    </div>

</section>

@endsection