@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')
<div class="container-fluid">
    <div class="row g-4 mb-4">
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <i class="fa fa-wallet fa-2x text-primary"></i>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('topup') }}" class="badge bg-info">NẠP THÊM</a>
                        </div>
                    </div>
                    <h3 class="mb-2">{{ Auth::check() ? number_format(Auth::user()->balance, 0, ',', '.') : '0' }}<small class="text-muted fs-13">đ</small></h3>
                    <h6 class="text-muted mb-0">SỐ DƯ HIỆN TẠI</h6>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <i class="fa fa-arrow-down fa-2x text-danger"></i>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('topup') }}" class="badge bg-danger">NẠP THÊM</a>
                        </div>
                    </div>
                    <h3 class="mb-2">0<small class="text-muted fs-13">đ</small></h3>
                    <h6 class="text-muted mb-0">TỔNG TIỀN NẠP</h6>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <i class="fa fa-arrow-up fa-2x text-primary"></i>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('topup') }}" class="badge bg-primary">NẠP THÊM</a>
                        </div>
                    </div>
                    <h3 class="mb-2">0<small class="text-muted fs-13">đ</small></h3>
                    <h6 class="text-muted mb-0">SỐ TIỀN ĐÃ CHI TIÊU</h6>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <i class="fa fa-percent fa-2x text-success"></i>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('topup') }}" class="badge bg-success">NẠP THÊM</a>
                        </div>
                    </div>
                    <h3 class="mb-2">0<small class="text-muted fs-13">%</small></h3>
                    <h6 class="text-muted mb-0">GIẢM GIÁ</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome Section -->
    <div class="card mb-4">
        <div class="card-body">
            <h4 class="display-6">WELCOME BACK! {{ Auth::check() ? Auth::user()->name : 'Khách' }}!</h4>
            <p class="mt-3"><b>Hướng dẫn nạp game tại JD-Shop:</b> <a href="#" class="text-primary">Xem tại đây</a></p>
            <p><b>Discord hỗ trợ:</b> <a href="#" class="text-primary">Bấm vào đây</a></p>
            <p><b>Nhắn Zalo:</b> <a href="#" class="text-primary">Bấm vào đây</a></p>
            <p><b>Cần trợ giúp liên hệ:</b> <a href="#" class="text-primary">Facebook</a> - <a href="#" class="text-primary">Zalo</a> - <a href="#" class="text-primary">Discord</a></p>
            <div class="mt-4">
                @if (!Auth::check())
                    <a href="{{ route('login') }}" class="btn btn-danger me-2">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="btn btn-info">Đăng ký</a>
                @else
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Đăng xuất</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- Product Listings (dùng card hoặc accordion giống test.html nếu muốn) -->
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-dark text-white">NẠP GENSHIN IMPACT</div>
                <div class="card-body">
                    <a href="{{ route('genshin.monthly') }}" class="d-block mb-2">Thẻ tháng Genshin Impact</a>
                    <a href="{{ route('genshin.crystals') }}" class="d-block mb-2">Đá Sáng Thế</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-dark text-white">NẠP HONKAI STAR RAIL</div>
                <div class="card-body">
                    <a href="{{ route('honkai.monthly') }}" class="d-block mb-2">Thẻ tháng Honkai Star Rail</a>
                    <a href="{{ route('honkai.dreams') }}" class="d-block mb-2">Mộng Ước Viễn Cổ</a>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-dark text-white">NẠP ZENLESS ZONE ZERO</div>
                <div class="card-body">
                    <a href="{{ route('zenless.monthly') }}" class="d-block mb-2">Thẻ tháng Zenless Zone Zero</a>
                    <a href="{{ route('zenless.film') }}" class="d-block mb-2">Film Truyền Đen</a>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection