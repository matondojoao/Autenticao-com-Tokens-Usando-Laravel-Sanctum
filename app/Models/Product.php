<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','description','stock','minimum_stock','maximum_stock',
        'price_purchase','price_sale','tax','discount','active'
    ];
}
