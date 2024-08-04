<?php

namespace App\Models;

use App\Enums\Situation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'governorate',
        'delegation',
        'city',
        'situation',
        'school',
        'study_field',
        'study_year',
        'current_position',
        'interests',
        'room_type',
        'motivation',
        'conference_idea',
        'need_transport',
        'heard_from',
        'agreement',
    ];

    protected $casts = [
        'interests' => 'array',
        'heard_from' => 'array',
        'need_transport' => 'boolean',
        'situation' => Situation::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
