<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\Gender;
use App\Enums\Situation;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'gender',
        'address',
        'situation',
        'status',
        'is_member',
        'date_of_birth',
        'last_login',
        'settings',
        'google_id',
        'facebook_id',
        'github_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'settings' => 'array',
            'last_login' => 'datetime',
            'is_member' => 'boolean',
            'gender' => Gender::class,
            'situation' => Situation::class,
            'status' => UserStatus::class,
        ];
    }
}
