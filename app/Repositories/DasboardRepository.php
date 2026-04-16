<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DasboardRepository
{
    // Giữ nguyên các biến này
    protected $statusPending = 1;
    protected $statusCompleted = 6;
    protected $roleCustomer = 3;    

    public function getTotalRevenueThisMonth()
    {
        return Order::where('status_id', $this->statusCompleted)
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->sum('total_amount');
    }

    public function getNewOrdersCount()
    {
        return Order::where('status_id', $this->statusPending)->count();
    }

    public function getRevenueLast7Days()
    {
        return Order::where('status_id', $this->statusCompleted)
            ->where('created_at', '>=', Carbon::now()->subDays(6)->startOfDay())
            ->select(
                DB::raw("CAST(created_at AS DATE) as date"),
                DB::raw("SUM(total_amount) as total")
            )
            ->groupBy(DB::raw("CAST(created_at AS DATE)"))
            ->orderBy('date', 'ASC')
            ->get();
    }

    public function getTotalCustomers()
    {
        return User::where('role_id', $this->roleCustomer)->count();
    }

    public function getLowStockProductsCount()
    {
        return ProductVariant::where('quantity', '<', 5)->count();
    }

    public function getLatestOrders()
    {
        return Order::with(['user', 'status','paymentStatus'])
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();
    }

    //  lấy trạng thái đơn hàng để vẽ biểu đồ tròn (Pie Chart)
    public function getOrderGroupByStatus()
    {
        return Order::select('status_id', DB::raw('count(*) as total'))
            ->groupBy('status_id')
            ->get();
    }
}