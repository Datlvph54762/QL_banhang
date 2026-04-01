<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    /** @use HasFactory<\Database\Factories\OrderDetailFactory> */
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_variant_id',
        'price',
        'quantity',
        'note'
    ];

    public function Order(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function variants(){
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }
}
