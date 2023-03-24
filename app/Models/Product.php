<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'photos' => 'array',
        'attributes.pivot.values' => 'array'
    ];
    public function productable()
    {
        return $this->morphTo();
    }
    public function mainCategory()
    {
        return $this->belongsTo(\App\Models\MainCategory::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(\App\Models\SubCategory::class);
    }
    public function wishlist()
    {
        return $this->belongsTo(\App\Models\Wishlist::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(\App\Models\Attribute::class)->withPivot('values');
    }
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
