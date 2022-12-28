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

    protected $appends=['_links'];

    public function getLinksAttribute(){
        return[
            'href'=>route('product.show',['id'=>$this->id]),
            'rel'=>'product'
        ];
    }
}
