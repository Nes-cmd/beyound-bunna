<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippmentAdress extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class, 'country_id');
    }
    public function city()
    {
        return $this->belongsTo(\App\Models\CountryCity::class, 'city_id');
    }
    public function order()
    {
        return $this->hasOne(\App\Models\Order::class);
    }
}