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
    <!-- Product Listings -->
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="mt-3">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 me-1">
                        <i class="menu-icon me-1">
                            <img width="40" src="{{ asset('assets/storage/images/categorySMUB.png') }}">
                        </i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="fs-16 mb-0 fw-semibold">NẠP GENSHIN IMPACT</h5>
                    </div>
                </div>
                <div class="accordion" id="accordionGenshin">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingGenshin1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenshin1" aria-expanded="false" aria-controls="collapseGenshin1">
                                Thẻ tháng Genshin Impact
                            </button>
                        </h2>
                        <div id="collapseGenshin1" class="accordion-collapse collapse" aria-labelledby="headingGenshin1" data-bs-parent="#accordionGenshin">
                            <div class="accordion-body">
                                <a href="{{ route('genshin.monthly') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>Không Nguyệt Chúc Phúc (Thẻ Tháng)</span>
                                    <span class="badge bg-primary">Giá 95.000đ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingGenshin2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGenshin2" aria-expanded="false" aria-controls="collapseGenshin2">
                                Đá Sáng Thế
                            </button>
                        </h2>
                        <div id="collapseGenshin2" class="accordion-collapse collapse" aria-labelledby="headingGenshin2" data-bs-parent="#accordionGenshin">
                            <div class="accordion-body">
                                <a href="{{ route('genshin.crystals') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>60 Đá Sáng Thế</span>
                                    <span class="badge bg-primary">Giá 23.000đ</span>
                                </a>
                                <a href="{{ route('genshin.crystals') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>300 + 30 Đá Sáng Thế</span>
                                    <span class="badge bg-primary">Giá 95.000đ</span>
                                </a>
                                <a href="{{ route('genshin.crystals') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>980 + 110 Đá Sáng Thế</span>
                                    <span class="badge bg-primary">Giá 290.000đ</span>
                                </a>
                                <a href="{{ route('genshin.crystals') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>1980 + 260 Đá Sáng Thế</span>
                                    <span class="badge bg-primary">Giá 635.000đ</span>
                                </a>
                                <a href="{{ route('genshin.crystals') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>3280 + 600 Đá Sáng Thế</span>
                                    <span class="badge bg-primary">Giá 950.000đ</span>
                                </a>
                                <a href="{{ route('genshin.crystals') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>6480 + 1600 Đá Sáng Thế</span>
                                    <span class="badge bg-primary">Giá 1.950.000đ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="mt-3">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 me-1">
                        <i class="menu-icon me-1">
                            <img width="40" src="{{ asset('assets/storage/images/categoryDLQN.png') }}">
                        </i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="fs-16 mb-0 fw-semibold">NẠP HONKAI STAR RAIL</h5>
                    </div>
                </div>
                <div class="accordion" id="accordionHSR">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingHSR1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHSR1" aria-expanded="false" aria-controls="collapseHSR1">
                                Thẻ tháng Honkai Star Rail
                            </button>
                        </h2>
                        <div id="collapseHSR1" class="accordion-collapse collapse" aria-labelledby="headingHSR1" data-bs-parent="#accordionHSR">
                            <div class="accordion-body">
                                <a href="{{ route('honkai.monthly') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>Chứng Nhận Tiếp Tế Đội Tàu (Thẻ Tháng)</span>
                                    <span class="badge bg-primary">Giá 95.000đ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingHSR2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHSR2" aria-expanded="false" aria-controls="collapseHSR2">
                                Mộng Ước Viễn Cổ
                            </button>
                        </h2>
                        <div id="collapseHSR2" class="accordion-collapse collapse" aria-labelledby="headingHSR2" data-bs-parent="#accordionHSR">
                            <div class="accordion-body">
                                <a href="{{ route('honkai.dreams') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>60 Mộng Ước Viễn Cổ</span>
                                    <span class="badge bg-primary">Giá 23.000đ</span>
                                </a>
                                <a href="{{ route('honkai.dreams') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>300 + 30 Mộng Ước Viễn Cổ</span>
                                    <span class="badge bg-primary">Giá 95.000đ</span>
                                </a>
                                <a href="{{ route('honkai.dreams') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>980 + 110 Mộng Ước Viễn Cổ</span>
                                    <span class="badge bg-primary">Giá 295.000đ</span>
                                </a>
                                <a href="{{ route('honkai.dreams') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>1980 + 260 Mộng Ước Viễn Cổ</span>
                                    <span class="badge bg-primary">Giá 615.000đ</span>
                                </a>
                                <a href="{{ route('honkai.dreams') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>3280 + 600 Mộng Ước Viễn Cổ</span>
                                    <span class="badge bg-primary">Giá 975.000đ</span>
                                </a>
                                <a href="{{ route('honkai.dreams') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>6480 + 1600 Mộng Ước Viễn Cổ</span>
                                    <span class="badge bg-primary">Giá 1.950.000đ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="mt-3">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 me-1">
                        <i class="menu-icon me-1">
                            <img width="40" src="{{ asset('assets/storage/images/iconQJOA.png') }}">
                        </i>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="fs-16 mb-0 fw-semibold">NẠP ZENLESS ZONE ZERO</h5>
                    </div>
                </div>
                <div class="accordion" id="accordionZZZ">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingZZZ1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZZZ1" aria-expanded="false" aria-controls="collapseZZZ1">
                                Thẻ tháng Zenless Zone Zero
                            </button>
                        </h2>
                        <div id="collapseZZZ1" class="accordion-collapse collapse" aria-labelledby="headingZZZ1" data-bs-parent="#accordionZZZ">
                            <div class="accordion-body">
                                <a href="{{ route('zenless.monthly') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>Hội Viên Inter-Knot (Thẻ Tháng)</span>
                                    <span class="badge bg-primary">Giá 105.000đ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingZZZ2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseZZZ2" aria-expanded="false" aria-controls="collapseZZZ2">
                                Film Truyền Đen
                            </button>
                        </h2>
                        <div id="collapseZZZ2" class="accordion-collapse collapse" aria-labelledby="headingZZZ2" data-bs-parent="#accordionZZZ">
                            <div class="accordion-body">
                                <a href="{{ route('zenless.film') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>60 Film Trắng Đen</span>
                                    <span class="badge bg-primary">Giá 23.000đ</span>
                                </a>
                                <a href="{{ route('zenless.film') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>300 + 30 Film Trắng Đen</span>
                                    <span class="badge bg-primary">Giá 105.000đ</span>
                                </a>
                                <a href="{{ route('zenless.film') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>980 + 110 Film Trắng Đen</span>
                                    <span class="badge bg-primary">Giá 315.000đ</span>
                                </a>
                                <a href="{{ route('zenless.film') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>1980 + 260 Film Trắng Đen</span>
                                    <span class="badge bg-primary">Giá 670.000đ</span>
                                </a>
                                <a href="{{ route('zenless.film') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>3280 + 600 Film Trắng Đen</span>
                                    <span class="badge bg-primary">Giá 1.050.000đ</span>
                                </a>
                                <a href="{{ route('zenless.film') }}" class="btn btn-outline-primary w-100 mb-2 d-flex justify-content-between align-items-center">
                                    <span>6480 + 1600 Film Trắng Đen</span>
                                    <span class="badge bg-primary">Giá 2.100.000đ</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Listings -->
</div> 
@endsection