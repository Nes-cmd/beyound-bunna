<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelBooking extends Model
{
    protected $guarded = [];
    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
