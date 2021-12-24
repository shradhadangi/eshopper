<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcat_id',
        'name',
        'price',
        'sku_id',
        'short_description',
        'delivery_detail',
        'shipping_detail',
        'size_guide',
        'product_description',
        'cms',
        'image',
        'size',
        'colors',
        'status',
    ];
}
