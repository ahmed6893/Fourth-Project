<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    protected $fillable = ['first_name', 'last_name', 'phone', 'email', 'password'];

    public static function saveNewCustomer($request)
    {
       return Customer::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'email'      => $request->email,
            'password'   => bcrypt($request->password),
        ]);

    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

}
