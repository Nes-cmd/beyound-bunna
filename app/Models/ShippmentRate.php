<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippmentRate extends Model
{
    use HasFactory;
    protected $guarded = [];
    // public function country()
    // {
    //     return $this->belongsTo(Country::class);
    // }
    // public function city()
    // {
    //     return $this->belongsTo(CountryCity::class);
    // }
    public function zone()
    {
        return $this->belongsTo(Zone::class, 'zone_id');
    }
}
