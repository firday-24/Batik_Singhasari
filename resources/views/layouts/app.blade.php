<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Batik Singhasari - Batik Khas Malang')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --batik-brown: #5D4037;
            --batik-cream: #EFEBE9;
            --batik-gold: #D4AF37;
            --batik-dark: #3E2723;
            --batik-light: #F5F3F0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--batik-light);
            color: var(--batik-dark);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar */
        .navbar-custom {
            background: linear-gradient(135deg, var(--batik-brown) 0%, var(--batik-dark) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-custom .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--batik-gold) !important;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .navbar-custom .nav-link {
            color: var(--batik-cream) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            transition: all 0.3s;
        }

        .navbar-custom .nav-link:hover {
            color: var(--batik-gold) !important;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(rgba(93, 64, 55, 0.7), rgba(62, 39, 35, 0.7)), 
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%235D4037" width="1200" height="600"/><path fill="%23D4AF37" opacity="0.1" d="M0 300 Q300 200 600 300 T1200 300 V600 H0 Z"/></svg>');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            color: white;
            text-align: center;
        }

        /* Card Styles */
        .card-batik {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: white;
        }

        .card-batik:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .card-batik img {
            height: 250px;
            object-fit: cover;
            transition: all 0.3s;
        }

        .card-batik:hover img {
            transform: scale(1.1);
        }

        /* Buttons */
        .btn-batik {
            background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold));
            color: white;
            border: none;
            padding: 10px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-batik:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
            color: white;
        }

        /* Footer */
        .footer-batik {
            background: linear-gradient(135deg, var(--batik-dark) 0%, var(--batik-brown) 100%);
            color: var(--batik-cream);
            padding: 40px 0 20px;
            margin-top: 50px;
        }

        /* Badge */
        .badge-batik {
            background-color: var(--batik-gold);
            color: var(--batik-dark);
            padding: 5px 15px;
            border-radius: 20px;
        }

        /* Price Tag */
        .price-tag {
            color: var(--batik-gold);
            font-size: 1.5rem;
            font-weight: 700;
        }

        /* Star Rating */
        .star-rating {
            color: var(--batik-gold);
        }

        /* Section Title */
        .section-title {
            color: var(--batik-brown);
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, var(--batik-gold), var(--batik-brown));
        }

        /* Alert */
        .alert-success {
            background-color: var(--batik-cream);
            border-color: var(--batik-gold);
            color: var(--batik-brown);
        }
    </style>

    @yield('extra-css')
</head>
<body>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-star-of-david"></i> Batik Singhasari
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('katalog') }}">
                            <i class="fas fa-shopping-bag"></i> Katalog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('promo') }}">
                            <i class="fas fa-gift"></i> Promo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tentang') }}">
                            <i class="fas fa-info-circle"></i> Tentang
                        </a>
                    </li>
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-shield"></i> Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-batik">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3" style="color: var(--batik-gold);">
                        <i class="fas fa-star-of-david"></i> Batik Singhasari
                    </h5>
                    <p>Melestarikan warisan budaya batik khas Malang melalui platform digital modern.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3" style="color: var(--batik-gold);">Kontak</h5>
                    @if(isset($profil))
                    <p><i class="fas fa-envelope"></i> {{ $profil->email ?? 'info@batiksinghasari.com' }}</p>
                    <p><i class="fab fa-whatsapp"></i> {{ $profil->whatsapp ?? '08123456789' }}</p>
                    <p><i class="fas fa-map-marker-alt"></i> {{ $profil->lokasi ?? 'Malang, Jawa Timur' }}</p>
                    @endif
                </div>
                <div class="col-md-4 mb-3">
                    <h5 class="mb-3" style="color: var(--batik-gold);">Link Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('katalog') }}" class="text-decoration-none text-light">Katalog Produk</a></li>
                        <li><a href="{{ route('promo') }}" class="text-decoration-none text-light">Promo Terkini</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-decoration-none text-light">Tentang Kami</a></li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: var(--batik-gold);">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Batik Singhasari. Kelompok SI-A | Pemrograman Web</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('extra-js')
</body>
</html>