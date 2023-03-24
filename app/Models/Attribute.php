<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Attribute extends Model
{
    // use HasFactory;
    protected $guarded = [];
    // public $timestamps = false;
    protected $casts = [
        'products.pivot.values' => 'array'
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('values');
    }
}
