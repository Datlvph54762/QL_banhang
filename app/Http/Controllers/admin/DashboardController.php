<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Services\DasboardService;

class DashboardController extends Controller
{
    protected $dasboardService;

    public function __construct(DasboardService $dasboardService)
    {
        $this->dasboardService = $dasboardService;
    }

    public function index()
    {
        $stats = $this->dasboardService->getDashboardStats();

        return view('admin.dashboard.index', $stats);
    }

    public function welcome()
    {
        return view('admin.dashboard.welcome');
    }
}
