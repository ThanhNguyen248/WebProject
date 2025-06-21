@extends('layouts.app')

@section('title', 'MỘNG ƯỚC VIỄN CỔ')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">MỘNG ƯỚC VIỄN CỔ</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0" style="font-size:13px;">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item">NẠP HONKAI STAR RAIL</li>
                        <li class="breadcrumb-item active">MỘNG ƯỚC VIỄN CỔ</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Form đặt hàng -->
        <div class="col-lg-8">
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="ribbon ribbon-primary ribbon-shape">TẠO ĐƠN HÀNG MỘNG ƯỚC VIỄN CỔ</div>
                    </div>
                    <form id="form">
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label">UID</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" id="uid" placeholder="Nhập UID của bạn tại đây">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label">Server</label>
                            <div class="col-lg-9">
                                <select class="form-select" id="server">
                                    <option value="">-- Chọn Server --</option>
                                    <option value="America">America</option>
                                    <option value="Asia">Asia</option>
                                    <option value="Europe">Europe</option>
                                    <option value="TW,HK,MO">TW,HK,MO</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label">Gói nạp</label>
                            <div class="col-lg-9">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input pack" name="service_pack" value="118" id="pack118" data-product-name="60 Mộng Ước Viễn Cổ">
                                    <label class="form-check-label" for="pack118">60 Mộng Ước Viễn Cổ <span class="badge bg-info">23.000đ</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input pack" name="service_pack" value="119" id="pack119" data-product-name="300 + 30 Mộng Ước Viễn Cổ">
                                    <label class="form-check-label" for="pack119">300 + 30 Mộng Ước Viễn Cổ <span class="badge bg-info">95.000đ</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input pack" name="service_pack" value="120" id="pack120" data-product-name="980 + 110 Mộng Ước Viễn Cổ">
                                    <label class="form-check-label" for="pack120">980 + 110 Mộng Ước Viễn Cổ <span class="badge bg-info">290.000đ</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input pack" name="service_pack" value="121" id="pack121" data-product-name="1980 + 260 Mộng Ước Viễn Cổ">
                                    <label class="form-check-label" for="pack121">1980 + 260 Mộng Ước Viễn Cổ <span class="badge bg-info">635.000đ</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input pack" name="service_pack" value="122" id="pack122" data-product-name="3280 + 600 Mộng Ước Viễn Cổ">
                                    <label class="form-check-label" for="pack122">3280 + 600 Mộng Ước Viễn Cổ <span class="badge bg-info">950.000đ</span></label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input pack" name="service_pack" value="123" id="pack123" data-product-name="6480 + 1600 Mộng Ước Viễn Cổ">
                                    <label class="form-check-label" for="pack123">6480 + 1600 Mộng Ước Viễn Cổ <span class="badge bg-info">1.950.000đ</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label">Số lượng</label>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" id="amount" value="1" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-lg-3 col-form-label">Mã giảm giá</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" id="voucher" placeholder="Nhập mã giảm giá">
                            </div>
                        </div>
                        <div class="alert alert-primary text-center">
                            Số tiền cần thanh toán: <b id="total" style="color: red;">0</b>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-danger" id="btnSubmit">Tạo Đơn</button>
                            <input type="hidden" id="product_name">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Đăng nhập + Lưu ý -->
        <div class="col-lg-4">
            @guest
            <!-- ĐĂNG NHẬP -->
            <div class="card ribbon-box mb-3">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="ribbon ribbon-primary ribbon-shape">ĐĂNG NHẬP</div>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="username" placeholder="Vui lòng nhập tên đăng nhập">
                        </div>
                        <div class="mb-3">
                            <div class="float-end">
                                <a href="{{ url('/register') }}" class="text-muted">Đăng ký tài khoản</a>
                            </div>
                            <label class="form-label" for="password-input">Mật khẩu</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" class="form-control pe-5" placeholder="Vui lòng nhập mật khẩu" id="password">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted"
                                    type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-success w-100" id="btnLogin" type="button">Đăng Nhập</button>
                        </div>
                    </form>
                </div>
            </div>
            @endguest
            <!-- LƯU Ý -->
            <div class="card ribbon-box">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="ribbon ribbon-primary ribbon-shape">LƯU Ý</div>
                    </div>
                    <p><span style="color:#e74c3c"><strong>Cần nhập&nbsp;chính&nbsp;xác&nbsp;UID và&nbsp;Server</strong></span></p>
                    <p><strong>Tham gia nhóm <a href="" target="_blank">Zalo</a> và <a href="" target="_blank">Discord</a> của J & D Store để nhận được thông tin ưu đãi giảm giá sớm nhất.</strong></p>
                    <p><em>Liên hệ hỗ trợ hoặc nạp trực tiếp tại: <a href="" target="_blank">Facebook</a> hoặc <a href="" target="_blank">Zalo</a></em></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function totalPayment() {
    $('#total').html('Đang xử lý...');
    $.ajax({
        url: "{{ url('/api/total-payment') }}",
        method: "POST",
        dataType: "JSON",
        data: {
            service_pack: $('input[name=service_pack]:checked', '#form').val(),
            amount: $("#amount").val(),
            voucher: $("#voucher").val().toUpperCase(),
            product_name: $('#product_name').val(), 
            _token: '{{ csrf_token() }}'
        },
        success: function(respone) {
            $("#total").html(respone.total);
        },
        error: function() {
            alert('Không thể tính kết quả thanh toán');
        }
    });
}
$('input[name=service_pack], #voucher').on('change keyup', totalPayment);
$('input[name=service_pack]').on('change', function() {
    var pname = $(this).data('product-name');
    $('#product_name').val(pname);
    totalPayment(); 
});
$('#btnSubmit').on('click', function() {
    $.ajax({
        url: "{{ url('/api/orders') }}",
        method: "POST",
        dataType: "JSON",
        data: {
            uid: $('#uid').val(),
            server: $('#server').val(),
            service_pack: $('input[name=service_pack]:checked').val(),
            amount: $('#amount').val(),
            voucher: $('#voucher').val(),
            product_name: $('#product_name').val(),
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            alert(response.message || 'Tạo đơn thành công!');
        },
        error: function(xhr) {
            if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.message) {
                alert(xhr.responseJSON.message);
            } else {
                alert('Có lỗi xảy ra khi tạo đơn!');
            }
        }
    });
});
</script>
@endpush

@push('styles')
<style>
.ribbon-box {
    position: relative;
    margin-top: 32px; 
}
.ribbon {
    position: absolute;
    top: -12px;
    left: 12px;
    background: #000;
    color: #fff;
    padding: 6px 18px;
    font-size: 15px;
    font-weight: bold;
    border-radius: 4px;
    z-index: 2;
}
</style>
@endpush