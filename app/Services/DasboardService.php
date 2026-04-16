<?php
namespace App\Services;

use App\Repositories\DasboardRepository;
use Carbon\Carbon;

class DasboardService
{
    protected $dasboardRepo;

    public function __construct(DasboardRepository $dasboardRepository)
    {
        $this->dasboardRepo= $dasboardRepository;
    }

    // Hàm lấy tất cả số liệu tổng quan
    public function getDashboardStats()
    {
        return [
            'totalRevenue'   => $this->dasboardRepo->getTotalRevenueThisMonth(),
            'newOrdersCount' => $this->dasboardRepo->getNewOrdersCount(),
            'totalCustomers' => $this->dasboardRepo->getTotalCustomers(),
            'lowStockCount'  => $this->dasboardRepo->getLowStockProductsCount(),
            'latestOrders'   => $this->dasboardRepo->getLatestOrders(),
            'chartData'      => $this->formatChartData($this->dasboardRepo->getRevenueLast7Days()),
        ];
    }

    // Hàm format dữ liệu Repository trả về thành dạng Chart.js cần
    private function formatChartData($revenueData)
    {
        $labels = [];
        $values = [];

        // Tạo mảng 7 ngày gần nhất để đảm bảo không bị mất ngày nào nếu không có đơn
        for ($i = 6
        ; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d'); // Định dạng để so sánh
            $label = Carbon::now()->subDays($i)->format('d/m'); // Định dạng để hiển thị (ví dụ 01/05)
            
            $labels[] = $label;

            // Tìm xem ngày này có doanh thu trong DB không
            $dayData = $revenueData->firstWhere('date', $date);
            $values[] = $dayData ? $dayData->total : 0; 
        }

        return [
            'labels' => $labels,
            'values' => $values,
        ];
    }
}