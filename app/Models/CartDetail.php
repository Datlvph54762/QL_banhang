<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    /** @use HasFactory<\Database\Factories\CartDetailFactory> */
    use HasFactory;

    public function variant(){
        return $this->belongsTo(ProductVariant::class,'product_variant_id');
    }
}
