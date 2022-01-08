<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class Order_item extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class,'order_no');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
