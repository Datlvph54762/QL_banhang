<?php

namespace Database\Seeders;

use App\Models\PaymentStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentStatuses=[
            'Chưa thanh toán',
            'Đã thanh toán'
        ];

        foreach ($paymentStatuses as $paymentStatus) {
            PaymentStatus::create(['name' => $paymentStatus]);
        }
    }
}
