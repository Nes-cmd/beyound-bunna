<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    public function mainCategory()
    {
        return $this->belongsTo(\App\Models\MainCategory::class);
    }
}
