<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table="order_item";
    protected $fillable = [
        'user_id', 'service_id', 'price', 'quantity', 'status',
    ];
}
