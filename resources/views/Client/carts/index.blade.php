@extends('client.layout.app')

@section('title', 'Trang chủ')

@section('content')

    <div class="container">
        <div class="link-title d-flex mx-5 pt-4 px-4">
            <a href="{{ route('client.home') }}" class="text-decoration-none text-dark link-success ">
                <p>Trang chủ ></p>
            </a>
            <a href="" class="text-decoration-none text-success fw-bold">
                <p class="ms-2">Giỏ hàng </p>
            </a>
        </div>
        @if($cart && $cart->cartDetail->count() > 0)
            <table class="table">
                <tr>
                    <th><input type="checkbox"></th>
                    <th>Thông tin sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiên</th>
                    <th></th>
                </tr>
                <tbody>
                    @foreach ($cart->cartDetail as $item)
                        <tr>
                            <td><input type="checkbox"></td>
                            <td class="d-flex">
                                <img src="{{ asset('storage/' . $item->variant->image) }}" width="100" height="100">
                                <div class="classic ms-2">
                                    <p class="fst-italic fw-bold">{{ $item->variant->product->name }}</p>
                                    <p>Phân loại: {{ $item->variant->color->name }} - {{ $item->variant->size->name }}</p>
                                </div>
                            </td>
                            <td>
                                <p>{{ number_format($item->variant->sale) }}</p>
                            </td>
                            <td>
                                <div class="quantity-input d-flex">
                                    <button type="button" class="btn-decrease px-2 border rounded-start text-danger">-</button>
                                    <input type="number" class="quantity-input p-1 text-center border text-center" style="width:10%"
                                        value="{{ $item->quantity }}" min="1">
                                    <button type="button" class="btn-increase px-2 border rounded-end text-danger">+</button>
                                </div>
                            </td>
                            <td>
                                <p class="text-danger">{{ number_format($item->Variant->sale * $item->quantity, 0, ',', '.') }}đ</p>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-warning" title="Xóa"
                                    onclick="return confirm('Bác có chắc muốn xóa không?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row ">
                <div class="col-lg-4 col-12 offset-md-8 offset-lg-8 offset-xl-8 py-3">
                    <div class="amount justify-content-between d-flex text-end ">
                        <p class="text-end fw-bold">Tổng tiền:</p>
                        <p class="fw-bold text-danger">{{ number_format($totalAmount, 0, ',', '.') }}đ</p>
                    </div>
                    <div class="button">
                        <button class="btn-mua btn btn-success text-white fw-bold w-100">Thanh toán</button>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Giỏ hàng của ông đang trống. <a href="{{ route('client.products.index') }}"> Mua sắm ngay nhé!</a>
            </div>
        @endif
    </div>

@endsection