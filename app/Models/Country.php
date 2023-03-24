<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CountryCity;

class Country extends Model
{
    // use HasFactory;
    protected $guarded = [];
    public function zone(){
        return $this->belongsTo(\App\Models\Zone::class, 'zone_id');
    }
    public function cities()
    {
        return $this->hasMany(CountryCity::class);
    }
}
