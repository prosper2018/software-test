<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'name', 'price', 'photo', 'description'
    ];

    public function order_item()
    {
        return $this->hasOne(OrderItem::class);
    }
}
