<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public function products()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }
    
}
