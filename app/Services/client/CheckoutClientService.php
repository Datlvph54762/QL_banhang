<?php

namespace App\Services\client;

use App\Repositories\CheckoutRepository;
use App\Repositories\ProductVariantRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutClientService
{
    protected $checkoutRepo;
    protected $productVariantRepo;

    public function __construct(CheckoutRepository $checkoutRepository, ProductVariantRepository $productVariantRepository)
    {
        $this->checkoutRepo = $checkoutRepository;
        $this->productVariantRepo = $productVariantRepository;
    }

    public function checkout($data, $checkData)
    {
        return DB::transaction(function () use ($data, $checkData) {
            $userId = Auth::id();

            $order= $this->checkoutRepo->createOrder([
                'user_id' => $userId,
                'payment_method' => $data['payment_method'] ?? 'COD',
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'subtotal' => $checkData['totalAmount'],
                'discount' => 0,
                'total_amount' => $checkData['totalAmount'] + $checkData['shippingFee'],
            ]);

            foreach ($checkData['cart']->cartDetail as $item) {
                $this->checkoutRepo->createOrderDetail([
                    'order_id' => $order->id,
                    'product_variant_id' => $item->product_variant_id,
                    'price' => $item->variant->sale,
                    'quantity' => $item->quantity,
                    'note' => $data['note'] ?? null, // Nếu ông có ô ghi chú
                ]);

                $this->productVariantRepo->decrementStock($item->product_variant_id, $item->quantity);
            }

            //Xóa giỏ hàng khi hoàn thành
            $checkData['cart']->cartDetail()->delete();

            //Xóa session
            session()->forget('checkout_data');

            return $order;
        });
    }
}