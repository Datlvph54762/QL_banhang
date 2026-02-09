@extends('admin.layout.app')

@section('title', 'Danh sách đơn hàng')

@section('content')
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h5 class="m-0 fw-bold text-primary">Danh sách Đơn hàng</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">User_id</th>
                            <th scope="col">Order_code</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total_amount</th>
                            <th scope="col" class="text-end">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->order_code }}</td>
                                <td>{{ $order->name }}</td>
                                <td>
                                    {{ $order->phone }}
                                </td>
                                <td>
                                    {{ $order->address}}
                                </td>
                                <td>{{ $order->subtotal }}</td>
                                <td>{{ $order->discount }}</td>
                                <td>{{ $order->total_amount }}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-outline-warning" title="Show">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection