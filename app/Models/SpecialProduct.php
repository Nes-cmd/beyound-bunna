<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SpecialProduct extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $casts = [
        'count_down' => 'datetime'
    ];
    protected $guarded = [];
    public function product()
    {
        return $this->hasOne(\App\Models\Product::class);
    }

}
