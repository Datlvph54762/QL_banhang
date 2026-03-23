<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }
}
