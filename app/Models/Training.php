<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
        'start_at' => 'datetime'
    ];
    public function bookings()
    {
        return $this->hasMany(TrainingBooking::class, 'training_id');
    }
    public function category()
    {
        return $this->belongsTo(TrainingCategory::class, 'category_id');
    }
}
