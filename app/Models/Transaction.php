<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'other_info' => 'array'
    ];
    public function order()
    {
        return $this->hasOne(\App\Models\Order::class);
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
