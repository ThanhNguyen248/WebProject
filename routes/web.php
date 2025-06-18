<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); // phải có file resources/views/topup.blade.php
})->name('home');

Route::get('/topup', function () {
    return view('topup'); // phải có file resources/views/topup.blade.php
})->name('topup');

// Lịch sử đơn hàng
Route::get('/orders/history', function () {
    return view('orders_history'); // hoặc tên file phù hợp
})->name('orders.history');

// Genshin Impact
Route::get('/genshin', function () {
    return view('genshin'); // tạo file genshin.blade.php
})->name('genshin');

Route::get('/genshin/monthly', function () {
    return view('genshin_monthly');
})->name('genshin.monthly');

Route::get('/genshin/crystals', function () {
    return view('genshin_crystals');
})->name('genshin.crystals');

// Honkai Star Rail
Route::get('/honkai', function () {
    return view('honkai'); // hoặc honkai.blade.php
})->name('honkai.starrail');

Route::get('/honkai/monthly', function () {
    return view('honkai_monthly');
})->name('honkai.monthly');

Route::get('/honkai/dreams', function () {
    return view('honkai_dreams');
})->name('honkai.dreams');

// Zenless Zone Zero
Route::get('/zenless', function () {
    return view('zenless');
})->name('zenless');

Route::get('/zenless/monthly', function () {
    return view('zenless_monthly');
})->name('zenless.monthly');

Route::get('/zenless/film', function () {
    return view('zenless_film');
})->name('zenless.film');

// Đăng nhập
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Đăng ký
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Đăng xuất (nếu có xử lý POST logout)
Route::post('/logout', function () {
    // Auth::logout(); // nếu dùng auth
    return redirect('/');
})->name('logout');