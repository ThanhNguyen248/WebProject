<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập | JD-Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { 
            background: url("{{ asset('images/giphy.gif') }}") no-repeat center center fixed; 
            background-size: cover;
            font-family: 'Oswald', sans-serif;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-4">
                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">! Xin Chào !</h5>
                        <p class="text-muted">Đăng nhập để sử dụng dịch vụ của SHOP nhé</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email hoặc Tên đăng nhập</label>
                                <input type="text" name="email" class="form-control" required autofocus placeholder="Nhập email hoặc tên đăng nhập">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Nhớ tôi</label>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center">
                <p class="mb-0">Cậu chưa có tài khoản ư? <a href="{{ route('register') }}" class="fw-semibold text-primary">Đăng Ký Ngay</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>