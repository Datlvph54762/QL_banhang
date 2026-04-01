<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Services\Client\CartClientService;
use App\Services\client\CheckoutClientService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutClientController extends Controller
{
    protected $checkoutService;
    protected $cartClientService;

    public function __construct(CheckoutClientService $checkoutClientService, CartClientService $cartClientService)
    {
        $this->checkoutService = $checkoutClientService;
        $this->cartClientService = $cartClientService;
    }

    public function index()
    {
        try {
            $userId = Auth::id();

            $data = $this->cartClientService->checkData($userId);

            return view('client.checkout.index', $data);
        } catch (\Exception) {
            return redirect()->route('client.carts.index')->with('error', 'Giỏ hàng đang bị trống');
        }

    }

    public function store(Request $request)
    {
        $userId = Auth::id();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,11',
            'address' => 'required|string|min:10',
            'payment_method' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập họ tên người nhận.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.numeric' => 'Số điện thoại phải là định dạng số.',
            'address.required' => 'Vui lòng nhập địa chỉ giao hàng cụ thể.',
            'payment_method.required' => 'Vui lòng tích chọn phương thức nhận hàng.',
        ]);

        try {
            $checkoutData = $this->cartClientService->checkData($userId);

            if (!$checkoutData) {
                return redirect()->route('client.carts.index')->with('error', 'Giỏ hàng trống!');
            }

            $order = $this->checkoutService->checkout($request->all(), $checkoutData);

            return redirect()->route('client.checkout.success', $order->id)->with('success', 'Hoàn tất đơn hàng');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra: ' . $e->getMessage())->withInput();
        };
    }

    public function success($id){
        $order= $this->checkoutService->getOrderUser($id);

        return view('client.checkout.success', compact('order'));
    }
}
