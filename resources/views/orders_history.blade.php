@extends('layouts.app')

@section('title', 'Lịch sử đơn hàng')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Lịch sử đơn hàng</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã đơn</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product->name ?? 'N/A' }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ number_format($order->total_price) }}đ</td>
                <td>{{ $order->status }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Chưa có đơn hàng nào.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection