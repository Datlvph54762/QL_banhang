<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_code',
        'name',
        'image',
        'description',
        'material',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
