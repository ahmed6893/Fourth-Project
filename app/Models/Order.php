<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function ordersDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

}
