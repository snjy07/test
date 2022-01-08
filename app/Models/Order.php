<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order_item;
use App\Models\Customer;

class Order extends Model
{
    use HasFactory;

    public function order_items(){
        return $this->hasMany(Order_item::class,'order_no');
    }

    public function customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }
}
