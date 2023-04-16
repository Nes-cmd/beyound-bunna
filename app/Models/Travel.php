<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Travel extends Model
{
    protected $guarded = [];
    protected $casts = [
        'images' => 'array',
        'closing_date' => 'datetime',
        'tags' => 'array',
        // 'location' => 'array',
    ];

    protected function location(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => json_decode($value),
        );
    }

    public function bookings()
    {
        return $this->hasMany(TravelBooking::class);
    }
}
