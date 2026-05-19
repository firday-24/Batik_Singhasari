@extends('layouts.app')

@section('title', 'Promo Batik Singhasari')

@section('content')

<section class="py-5">
    <div class="container">

        <h1 class="section-title text-center">
            Promo Terkini
        </h1>

        <div class="row">

            @forelse($promos as $promo)

            <div class="col-md-4 mb-4">

                <div class="card card-batik h-100">

                    @if($promo->gambar)

                    <img src="{{ asset('images/promo/' . $promo->gambar) }}"
                         class="card-img-top"
                         alt="{{ $promo->judul }}">

                    @else

                    <div style="
                        height:250px;
                        background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold));
                        display:flex;
                        align-items:center;
                        justify-content:center;
                    ">
                        <i class="fas fa-gift fa-4x text-white"></i>
                    </div>

                    @endif

                    <div class="card-body d-flex flex-column">

                        <h5 class="card-title">
                            {{ $promo->judul }}
                        </h5>

                        <p class="card-text flex-grow-1">
                            {{ $promo->isi }}
                        </p>

                        <p class="text-muted small">
                            <i class="fas fa-calendar"></i>

                            {{ $promo->tanggal_mulai->format('d M Y') }}

                            -

                            {{ $promo->tanggal_selesai->format('d M Y') }}
                        </p>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12 text-center">
                <p class="text-muted">
                    Belum ada promo tersedia.
                </p>
            </div>

            @endforelse

        </div>

        <div class="mt-4">
            {{ $promos->links() }}
        </div>

    </div>
</section>

@endsection