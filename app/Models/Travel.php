<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $guarded = [];
    protected $casts = [
        'images' => 'array',
        'closing_date' => 'datetime',
        'tags' => 'array',
    ];

    public function bookings()
    {
        return $this->hasMany(TravelBooking::class);
    }
}
