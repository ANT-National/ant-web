<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'objectives',
        'activities',
        'eventpicture',
        'event_start_date',
        'event_end_date',
        'location',
        'organizer',
        'capacity',
        'status',
        'certify',
        'programme',
    ];

    protected $casts = [
        'objectives' => 'array',
        'activities' => 'array',
        'event_start_date' => 'datetime',
        'event_end_date' => 'datetime',
        'programme' => 'array', // Casting programme as array
    ];
}
