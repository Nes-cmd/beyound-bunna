<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class RaimentProduct extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public function product()
    {
        return morphOne(Product::class, 'productable');
    }
}
