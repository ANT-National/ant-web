<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'user_id',
        'token',
        'qr_code',
        'validated',
    ];

    // Définir les relations avec les modèles Event et User
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
// Assurez-vous que le nom de la relation est correct
public function student()
{
    return $this->belongsTo(User::class, 'user_id'); // Spécifiez la clé étrangère si nécessaire
}

}
