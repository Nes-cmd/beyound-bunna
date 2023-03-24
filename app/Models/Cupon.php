<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    protected $fillable = ['id', 'code', 'givento_name', 'givento_phone','associated_with', 'discount','type', 'count', 'expire_at'];
}
