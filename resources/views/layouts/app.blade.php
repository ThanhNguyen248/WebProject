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
                <img src="https://via.placeholder.com/50" alt="Logo" height="50">
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
                <li class="menu-title"><span>SẢN PHẨM & DỊCH VỤ</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('genshin') }}">
                        <i class="fa fa-gamepad me-2"></i>Nạp Genshin Impact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('honkai.starrail') }}">
                        <i class="fa fa-rocket me-2"></i>Nạp Honkai: Star Rail
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('zenless') }}">
                        <i class="fa fa-bolt me-2"></i>Nạp Zenless Zone Zero
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#">
                        <i class="fa fa-ellipsis-h me-2"></i>Khác
                    </a>
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
    @stack('scripts')
</body>
</html>