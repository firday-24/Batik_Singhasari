<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Batik Singhasari')</title>
    
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

        /* Sidebar Admin */
        .admin-sidebar {
            background: linear-gradient(180deg, var(--batik-brown) 0%, var(--batik-dark) 100%);
            min-height: 100vh;
            color: white;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .admin-sidebar .nav-link {
            color: var(--batik-cream);
            font-weight: 500;
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 8px;
            transition: all 0.3s;
        }

        .admin-sidebar .nav-link:hover,
        .admin-sidebar .nav-link.active {
            background: rgba(212, 175, 55, 0.2);
            color: var(--batik-gold);
            transform: translateX(8px);
        }

        /* Topbar */
        .admin-topbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .card-batik {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            background: white;
        }

        .btn-batik {
            background: linear-gradient(135deg, var(--batik-brown), var(--batik-gold));
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            font-weight: 600;
        }

        .btn-batik:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(212, 175, 55, 0.4);
            color: white;
        }

        .section-title {
            color: var(--batik-brown);
            font-weight: 700;
            position: relative;
            padding-bottom: 12px;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--batik-gold), var(--batik-brown));
        }

        .text-batik {
            color: var(--batik-brown);
        }
    </style>

    @yield('extra-css')
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="admin-sidebar p-3" style="width: 260px;">
        <div class="text-center mb-4">
            <h4 class="fw-bold" style="color: var(--batik-gold);">
                <i class="fas fa-star-of-david"></i> Batik Singhasari
            </h4>
            <small class="opacity-75">Admin Panel</small>
        </div>

        <nav class="nav flex-column">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                <i class="fas fa-tags me-2"></i> Kategori
            </a>
            <a href="{{ route('admin.produk.index') }}" class="nav-link {{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i> Produk
            </a>
            <a href="{{ route('admin.promo.index') }}" class="nav-link {{ request()->routeIs('admin.promo.*') ? 'active' : '' }}">
                <i class="fas fa-percentage me-2"></i> Promo
            </a>
            <a href="{{ route('admin.review.index') }}" class="nav-link {{ request()->routeIs('admin.review.*') ? 'active' : '' }}">
                <i class="fas fa-star me-2"></i> Review
            </a>
            <a href="{{ route('admin.profil.index') }}" class="nav-link {{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                <i class="fas fa-store me-2"></i> Profil Toko
            </a>
        </nav>

        <hr class="my-4 mx-3">

        <a href="{{ url('/') }}" class="nav-link mx-3" target="_blank">
            <i class="fas fa-external-link-alt me-2"></i> Lihat Website
        </a>

        <form method="POST" action="{{ route('logout') }}" class="d-inline mx-3">
            @csrf
            <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>

    <!-- Main Content Area -->
    <div class="flex-grow-1">
        <!-- Topbar -->
        <nav class="admin-topbar">
            <div class="container-fluid px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-semibold text-batik">@yield('page-title', 'Dashboard')</h5>
                    
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-muted">{{ Auth::user()->name }}</span>
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.profil.edit') }}">Profil Toko</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button class="dropdown-item text-danger" type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="p-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('extra-js')

</body>
</html>