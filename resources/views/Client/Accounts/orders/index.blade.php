@extends('client.layout.app')

@section('content')
    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success ">
                <p>Trang chủ ></p>
            </a>
            <a href="" class="text-decoration-none ms-2 text-dark link-success fw-bold ">
                <p>Quản lí Giỏ hàng</p>
            </a>
        </div>
        <div class="cart-list py-3">
            <table class="table">
                <thead>
                    <tr>
                        <th>MÃ ĐƠN HÀNG</th>
                        <th>NGÀY TẠO ĐƠN</th>
                        <th>TRẠNG THÁI</th>
                        <th>SẢN PHẨM</th>
                        <th>TỔNG TIỀN</th>
                        <th>TÌNH TRẠNG</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->order_code }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->status->name }}</td>
                            <td>
                                @foreach ($order->orderDetails as $detail)
                                    <div class="image-product d-flex">
                                        <img src="{{ asset('storage/' . $detail->variants->image) }}" alt="ảnh"
                                            width="100" height="100">
                                        <div class="product ms-2">
                                            <p>{{ $detail->variants->product->name }}</p>
                                            <p>Phân loại: {{ $detail->variants->color->name }} -
                                                {{ $detail->variants->size->name }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <td>{{ number_format($order->total_amount) }} VNĐ</td>
                            <td>{{ $order->status->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection