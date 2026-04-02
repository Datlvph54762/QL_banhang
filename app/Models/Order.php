<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
    protected $fillable = ['user_id', 'status_id', 'payment_method', 'order_code', 'name', 'phone', 'address', 'subtotal', 'discount', 'total_amount', 'note'];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }

    public function paymentStatus(){
        return $this->belongsTo(PaymentStatus::class,'payment_status_id');
    }
}
