<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

Route::get('/', function () {
    return view('home'); 
})->name('home');

// Nạp tiền
Route::get('/topup', function () {
    return view('topup');
})->name('topup');

// Lịch sử đơn hàng
Route::get('/orders/history', function () {
    $orders = Order::with('product')->get(); 
    return view('orders_history', compact('orders'));
})->name('orders.history');

// Genshin Impact
Route::get('/genshin', function () {
    return view('genshin'); 
})->name('genshin');

Route::get('/genshin/monthly', function () {
    return view('genshin.monthly');
})->name('genshin.monthly');

Route::get('/genshin/crystals', function () {
    return view('genshin.crystals');
})->name('genshin.crystals');

// Honkai Star Rail
Route::get('/honkai', function () {
    return view('honkai'); 
})->name('honkai.starrail');

Route::get('/honkai/monthly', function () {
    return view('honkai.monthly');
})->name('honkai.monthly');

Route::get('/honkai/honkai_dreams', function () {
    return view('honkai.honkai_dreams');
})->name('honkai.dreams');

// Zenless Zone Zero
Route::get('/zenless', function () {
    return view('zenless');
})->name('zenless');

Route::get('/zenless/monthly', function () {
    return view('zenless.monthly');
})->name('zenless.monthly');

Route::get('/zenless/film', function () {
    return view('zenless.film');
})->name('zenless.film');

// Đăng nhập
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->only('email', 'password');
    if (Auth::attempt($credentials, request()->has('remember'))) {
        request()->session()->regenerate();
        return redirect()->intended('/');
    }
    return back()->withErrors([
        'email' => 'Thông tin đăng nhập không đúng.',
    ]);
});

// Đăng ký
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
    $validated = request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'string',
            'min:6',
            'regex:/[0-9]/',
            'confirmed'
        ],
    ], [
        'name.required' => 'Vui lòng nhập tên hiển thị.',
        'email.required' => 'Vui lòng nhập email.',
        'email.email' => 'Email không đúng định dạng.',
        'email.unique' => 'Email đã tồn tại.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
        'password.regex' => 'Mật khẩu phải chứa ít nhất một số.',
        'password.confirmed' => 'Nhập lại mật khẩu không khớp.',
    ]);
    // Tạo user mới
    \App\Models\User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
    ]);
    // Chuyển về trang đăng nhập
    return redirect()->route('login')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
});

// Đăng xuất
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

// API tạo đơn hàng
Route::post('/api/orders', function (Request $request) {
    $data = $request->validate([
        'uid' => 'required|numeric',
        'server' => 'required|string',
        'service_pack' => 'required',
        'amount' => 'required|integer|min:1',
        'voucher' => 'nullable|string',
    ]);

    $productName = $request->input('product_name');
    $product = \App\Models\Product::where('name', 'LIKE', "%$productName%")->first();

    if (!$product) {
        return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm!'], 422);
    }

    Order::create([
        'user_id' => Auth::check() ? Auth::id() : 0,
        'product_id' => $product->id,
        'quantity' => $data['amount'],
        'total_price' => $product->price * $data['amount'],
        'status' => 'pending',
    ]);
    return response()->json(['success' => true, 'message' => 'Tạo đơn thành công!']);
});

// API tính tổng tiền
Route::post('/api/total-payment', function (Request $request) {
    $amount = (int) $request->input('amount', 1);
    $productName = $request->input('product_name');
    $voucher = $request->input('voucher');

    $product = \App\Models\Product::where('name', 'LIKE', "%$productName%")->first();
    if (!$product) {
        return response()->json(['total' => 'Không tìm thấy sản phẩm!'], 422);
    }

    $total = $product->price * $amount;

    if ($voucher === 'GIAM10') {
        $total = $total * 0.9;
    }

    return response()->json([
        'total' => number_format($total, 0, ',', '.') . 'đ'
    ]);
});



