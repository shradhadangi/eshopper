<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected  $fillable = [
        'order_number',
        'customer_id',
        'customer_type',
        'address',
        'country',
        'state',
        'zipcode',
        'grand_total',
        'status',
        'remark',
    ];
}
