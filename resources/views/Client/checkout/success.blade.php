@extends('client.layout.app')

@section('title', 'Success')

@section('content')
    <div class="container text-center py-5">
        <h2>Cảm ơn quý khách đã mua hàng</h2>
        <p>Chào {{ $order->user->name ?? 'Quý khách' }}, đơn hàng của bạn với mã <span class="text-success">{{ $order->order_code }}</span> đã được đặt thành công.<br>
            <!-- Hệ thống sẽ tự động gửi Email và SMS xác nhận đơn hàng đến số điện thoại và hòm thư mà bạn đã cung cấp.<br> -->
            Cảm ơn {{ $order->user->name ?? 'Quý khách' }} đã tin dùng sản phẩm của <span class="fw-bold">STYLEHUB</span> <a href="">Xem chi tiết đơn hàng</a><br>
        </p>

        <p>--><a href="{{ route('client.products.index') }}">Tiếp tục mua<></a></p>
    </div>
@endsection