<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký | JD-Shop</title>
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
                        <h5 class="text-primary">Đăng ký tài khoản mới</h5>
                        <p class="text-muted">Tạo tài khoản để sử dụng dịch vụ của SHOP</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên hiển thị</label>
                                <input type="text" name="name" class="form-control" required autofocus placeholder="Nhập tên hiển thị" value="{{ old('name') }}">
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Nhập email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input type="password" name="password" class="form-control" required placeholder="Nhập mật khẩu">
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="password_confirmation">Nhập lại mật khẩu</label>
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Nhập lại mật khẩu">
                                @error('password_confirmation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success w-100">Đăng ký</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="mt-4 text-center">
                <p class="mb-0">Đã có tài khoản? <a href="{{ route('login') }}" class="fw-semibold text-primary">Đăng nhập</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>