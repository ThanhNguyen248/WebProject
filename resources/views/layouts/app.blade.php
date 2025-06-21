<!DOCTYPE html>
<html lang="vi" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-layout-style="default" data-sidebar-size="lg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JD-Shop')</title>
    <!-- Bootstrap & Icon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: 'Oswald', sans-serif; background: #f9fafb; }
        .navbar-menu { background: linear-gradient(#000, #000); border-right: #000; }
        .navbar-nav .nav-link { color: #dfdfdf; font-size: 16px; }
        .navbar-nav .nav-link.active, .navbar-nav .nav-link:hover { background: #333; color: #fff; }
        .menu-title { color: #838fb9; font-size: 13px; margin: 1rem 0 0.5rem 1rem; }
        .sidebar-balance { color: yellow; }
        .sidebar-discount { color: #0ab39c; }
        .main-content { margin-left: 0; padding: 0; min-height: 100vh; background: #f9fafb; }
        .app-menu { width: 250px; position: fixed; height: 100%; background: #1a1a1a; color: #fff; }
        .welcome-bg {
            background: #e3f2fd !important;
            border: none;
        }
        @media (min-width: 992px) {
            .main-content { margin-left: 250px; padding: 20px; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar/Menu -->
    <div class="app-menu navbar-menu">
        <div class="navbar-brand-box text-center py-3">
            <a href="{{ route('home') }}" class="logo logo-dark">
                <img src="{{ asset('images/Logo20250110012954029.png') }}" alt="Logo" height="100">
            </a>
        </div>
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="menu-title"><span>Số dư: <b class="sidebar-balance">{{ Auth::check() ? number_format(Auth::user()->balance, 0, ',', '.') . 'đ' : '0đ' }}</b><br>Giảm giá: <b class="sidebar-discount">0%</b></span></li>
                <li class="menu-title"><span>MENU</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fa fa-home me-2"></i>Trang chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('topup') }}">
                        <i class="fa fa-wallet me-2"></i>Nạp tiền
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ request()->routeIs('orders.history') ? 'active' : '' }}" href="{{ route('orders.history') }}">
                        <i class="fa fa-history me-2"></i>Lịch sử đơn hàng
                    </a>
                </li>
                <li class="menu-title"><span>PRODUCTS & SERVICES</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarGenshin" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarGenshin">
                        <img src="{{ asset('images/genshin.png') }}" alt="Genshin" width="28" class="me-2 align-middle">
                        <span>NẠP GENSHIN IMPACT</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarGenshin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('genshin.monthly') }}" class="nav-link">Thẻ Tháng Genshin Impact</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('genshin.crystals') }}" class="nav-link">Đá Sáng Thế</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarHSR" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarHSR">
                        <img src="{{ asset('images/honkai.png') }}" alt="Honkai" width="28" class="me-2 align-middle">
                        <span>NẠP HONKAI STAR RAIL</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarHSR">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('honkai.monthly') }}" class="nav-link">Thẻ Tháng HSR</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('honkai.dreams') }}" class="nav-link">Mộng Ước Viễn Cổ</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarZZZ" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarZZZ">
                        <img src="{{ asset('images/zenless.png') }}" alt="Zenless" width="28" class="me-2 align-middle">
                        <span>NẠP ZENLESS ZONE ZERO</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarZZZ">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('zenless.monthly') }}" class="nav-link">Thẻ Tháng ZZZ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('zenless.film') }}" class="nav-link">Film Trắng Đen</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('scripts')
</body>
</html>