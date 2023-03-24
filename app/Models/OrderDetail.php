<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // use HasFactory;
    protected $guarded = []; 
    protected $casts = [
        'specifications' => 'array'
    ];
    // protected function specifications(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => json_encode($value),
    //     );
    // }
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

}
