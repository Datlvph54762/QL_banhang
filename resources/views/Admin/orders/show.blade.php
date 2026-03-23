@extends('admin.layout.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="container-fluid">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between">
                <h5 class="mb-0 fw-bold text-dark">Chi tiết đơn hàng: #{{ $order->order_code }}</h5>
                <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </div>

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6 border-end">
                        <h6 class="text-uppercase fw-bold text-secondary mb-3" style="font-size: 0.8rem;">Thông tin người
                            nhận</h6>
                        <p class="mb-1"><strong>Họ tên:</strong> {{ $order->name }}</p>
                        <p class="mb-1"><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
                        <p class="mb-1"><strong>Địa chỉ:</strong> {{ $order->address }}</p>
                        <p class="mb-0"><strong>Ghi chú:</strong> <span
                                class="text-muted">{{ $order->note ?? 'Không có' }}</span></p>
                    </div>

                    <div class="col-md-6 ps-md-4">
                        <h6 class="text-uppercase fw-bold text-secondary mb-3" style="font-size: 0.8rem;">Thông tin đơn hàng
                        </h6>
                        <p class="mb-1"><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        <p class="mb-1"><strong>Trạng thái:</strong> <span class="badge bg-success">{{ $order->status->name }}</span>
                        </p>
                        <p class="mb-1"><strong>Thanh toán:</strong> </p>
                        <p class="mb-0"><strong>Tổng tiền:</strong> <span
                                class="text-danger fw-bold fs-5">{{ number_format($order->total_amount) }}đ</span></p>
                    </div>
                </div>

                <h6 class="text-uppercase fw-bold text-secondary mb-3" style="font-size: 0.8rem;">Sản phẩm đã đặt</h6>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="text-center" width="80">Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Biến thể</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-end">Đơn giá</th>
                                <th class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderDetails as $item)
                                <tr>
                                    <td class="text-center">
                                        <img src="{{ asset('storage/' . $item->variants->image) }}" width="50" class="rounded">
                                    </td>
                                    <td>{{ $item->variants->product->name }}</td>
                                    <td>
                                        <small class="text-muted">
                                            Màu: {{ $item->variants->color->name }}<br>
                                            Size: {{ $item->variants->size->name }}
                                        </small>
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">{{ number_format($item->price) }}đ</td>
                                    <td class="text-end fw-bold">{{ number_format($item->price * $item->quantity) }}đ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection