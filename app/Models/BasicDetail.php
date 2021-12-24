<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDetail extends Model
{
    use HasFactory;
    protected $table = "basic_details";
    protected $fillable = [
        'site_name',
        'phone',
        'email',
        'address',
        'logo',
        'map',
    ];
}
