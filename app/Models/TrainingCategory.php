<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingCategory extends Model
{
    protected $guarded = [];

    public function trainings()
    {
        return $this->hasMany(Training::class, 'category_id');
    }
}
