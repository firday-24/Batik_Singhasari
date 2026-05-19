<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Batik Singhasari')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
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
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--batik-brown) 0%, var(--batik-dark) 100%);
            padding: 20px 0;
            position: fixed;
            width: 250px;
        }

        .sidebar .nav-link {
            color: var(--batik-cream);
            padding: 12px 20px;
            margin: 5px 10px;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--batik-gold);
            color: var(--batik-dark);
            transform: translateX(5px);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .card-admin {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .card-admin .card-header {
            background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold));
            color: white;
            font-weight: 600;
            border-radius: 15px 15px 0 0 !important;
        }

        .btn-batik {
            background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-batik:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.4);
            color: white;
        }

        .stats-card {
            border-left: 4px solid var(--batik-gold);
            transition: all 0.3s;
        }

        .stats-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .table-custom {
            background: white;
            border-radius: 10px;
        }

        .table-custom thead {
            background-color: var(--batik-brown);
            color: white;
        }

        .navbar-admin {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
        }

        .logo-sidebar {
            color: var(--batik-gold);
            font-size: 1.5rem;
            font-weight: 700;
            text-align: center;
            padding: 20px;
            margin-bottom: 20px;
            border-bottom: 2px solid var(--batik-gold);
        }
    </style>

    @yield('extra-css')
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo-sidebar">
            <i class="fas fa-star-of-david"></i> Batik Singhasari
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}" href="{{ route('admin.kategori.index') }}">
                <i class="fas fa-tags"></i> Kategori
            </a>
            <a class="nav-link {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}" href="{{ route('admin.produk.index') }}">
                <i class="fas fa-box"></i> Produk
            </a>
            <a class="nav-link {{ request()->routeIs('admin.promo.*') ? 'active' : '' }}" href="{{ route('admin.promo.index') }}">
                <i class="fas fa-gift"></i> Promo
            </a>
            <a class="nav-link {{ request()->routeIs('admin.review.*') ? 'active' : '' }}" href="{{ route('admin.review.index') }}">
                <i class="fas fa-star"></i> Review
            </a>
            <a class="nav-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}" href="{{ route('admin.profil.index') }}">
                <i class="fas fa-store"></i> Profil Toko
            </a>
            <hr style="border-color: var(--batik-gold); margin: 20px;">
            <a class="nav-link" href="{{ route('home') }}" target="_blank">
                <i class="fas fa-globe"></i> Lihat Website
            </a>
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-admin navbar-expand-lg mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1" style="color: var(--batik-brown);">
                    @yield('page-title', 'Dashboard')
                </span>
                <div class="ms-auto">
                    <span class="text-muted">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </span>
                </div>
            </div>
        </nav>

        <!-- Alerts -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Page Content -->
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @yield('extra-js')
</body>
</html>