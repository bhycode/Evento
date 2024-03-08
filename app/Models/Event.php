<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'startDateTime',
        'endDateTime',
        'location',
        'availableSeats',
        'category_id',
    ];

    public function getStartDateTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function getEndDateTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
