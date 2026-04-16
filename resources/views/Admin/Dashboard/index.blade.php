@extends('admin.layout.app')

@section('content')
    <div class="container-fluid">
        {{-- Header & Filter --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold">Bảng điều khiển</h4>
                <p class="text-muted">Dữ liệu tính đến ngày: {{ now()->format('d/m/Y') }}</p>
            </div>
            <form id="filterForm" class="d-flex gap-2 align-items-center" action="" method="GET">
                <select id="filter_type" class="form-select form-select-sm w-auto">
                    <option value="day" selected>Theo ngày</option>
                    <option value="month">Theo tháng</option>
                    <option value="year">Theo năm</option>
                </select>

                <div id="filter-inputs" class="d-flex gap-2 align-items-center">
                    <input type="date" name="start_date" class="form-control form-control-sm"
                        value="{{ request('start_date', now()->startOfMonth()->format('Y-m-d')) }}">
                    <input type="date" name="end_date" class="form-control form-control-sm"
                        value="{{ request('end_date', now()->format('Y-m-d')) }}">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Lọc</button>
                <a href="{{ url()->current() }}" class="btn btn-outline-primary btn-sm">Tháng hiện tại</a>
            </form>
        </div>

        {{-- Thẻ thống kê nhanh --}}
        <div class="row mb-4">
            @php
                $stats = [
                    ['label' => 'TỔNG DOANH THU', 'value' => number_format($totalRevenue) . ' VND', 'color' => 'primary'],
                    ['label' => 'ĐƠN HÀNG MỚI', 'value' => number_format($newOrdersCount), 'color' => 'success'],
                    ['label' => 'TỔNG KHÁCH HÀNG', 'value' => number_format($totalCustomers), 'color' => 'info'],
                    ['label' => 'SẮP HẾT HÀNG', 'value' => number_format($lowStockCount), 'color' => 'danger'],
                ];
            @endphp
            @foreach($stats as $stat)
                <div class="col-md-3">
                    <div class="card text-center p-3 border-0 shadow-sm">
                        <h6 class="fw-bold text-muted small">{{ $stat['label'] }}</h6>
                        <h4 class="fw-bold text-{{ $stat['color'] }} mb-0">{{ $stat['value'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Biểu đồ doanh thu --}}
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">📊 Biểu đồ doanh thu 7 ngày gần nhất</h5>
                    <select id="chartSelector" class="form-select form-select-sm w-auto">
                        <option value="revenue">📈 Tổng Doanh thu</option>
                    </select>
                </div>
                <div style="width: 100%; height: 400px;">
                    <canvas id="chartCanvas"></canvas>
                </div>
            </div>
        </div>

        <div id="chartData" 
            data-labels='@json($chartData["labels"])' 
            data-values='@json($chartData["values"])'>
        </div>

        {{-- Bảng đơn hàng mới nhất --}}
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Đơn hàng mới nhất</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestOrders as $order)
                                <tr>
                                    <td class="fw-bold">{{ $order->order_code }}</td>
                                    <td>{{ $order->user->name ?? 'Khách lẻ' }}</td>
                                    <td class="text-primary fw-bold">{{ number_format($order->total_amount) }} VNĐ</td> 
                                    <td class="small">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        @php
                                            $sClass = match ($order->status_id) { 1 => 'primary', 6 => 'success', 9 => 'danger', default => 'secondary'};
                                        @endphp
                                        <span class="badge bg-{{ $sClass }}">{{ $order->status->name ?? 'N/A' }}</span>
                                    </td>
                                    <td>
                                        @php
                                            $pClass = match ($order->payment_status_id) { 1 => 'warning text-dark', 2 => 'success', default => 'secondary'};
                                        @endphp
                                        <span class="badge bg-{{ $pClass }}">{{ $order->paymentStatus->name ?? 'N/A' }}</span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">Không có dữ liệu đơn hàng.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('chartCanvas').getContext('2d');

            const data = document.getElementById('chartData').dataset;
            const labels = JSON.parse(data.labels);
            const values = JSON.parse(data.values);

            // Dùng labels và values này bỏ vào Chart là xong!

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Doanh thu (VND)",
                        data: values,
                        borderColor: "#4e73df",
                        backgroundColor: "rgba(78, 115, 223, 0.1)",
                        borderWidth: 3,
                        fill: true,
                        tension: 0.3,
                        pointRadius: 6,
                        pointBackgroundColor: "#4e73df"
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMax: 10000000, // Mốc max 
                            ticks: {
                                stepSize: 2000000, // Chia mốc mỗi 5 triệu
                                callback: (value) => value.toLocaleString('vi-VN') + ' đ'
                            },
                            grid: { color: "#f8f9fc" }
                        },
                        x: { grid: { display: false } }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: (ctx) => `Doanh thu: ${ctx.raw.toLocaleString('vi-VN')} VND`
                            }
                        },
                        legend: { display: false }
                    }
                }
            });
        });

    </script>
@endsection