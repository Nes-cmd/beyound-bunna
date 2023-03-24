<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function orderDetails()
    {
        return $this->hasMany(\App\Models\OrderDetail::class);
    }
    public function payment()
    {
        return $this->belongsTo(\App\Models\Transaction::class);
    }
    public function shippmentAdress()
    {
        return $this->belongsTo(\App\Models\ShippmentAdress::class, 'shppment_adress_id');
    }
}
