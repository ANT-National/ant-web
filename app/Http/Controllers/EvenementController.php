<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Event;
use App\Models\User;
use App\Models\EventUser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;


class EvenementController extends Controller
{
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return view('events.show', compact('event'));
    }

    public function participe($id, $userId)
    {
        // Crée un token unique pour le QR code
        $token = Str::random(32);

        // Hash le token pour le stockage sécurisé
        $hashedToken = hash('sha256', $token);

        // Enregistre les données dans la table event_user
        $eventUser = EventUser::create([
            'event_id' => $id,
            'user_id' => $userId,
            'token' => $hashedToken,
        ]);

        // Chiffre les données pour le QR code
        $secret = 'your-unique-secret-key'; // Assure-toi d'utiliser une clé secrète unique
        $data = $secret . ':' . $token;
        $encryptedData = Crypt::encryptString($data);

        // Génère le QR code
        $qrCode = QrCode::size(250)->generate($encryptedData);

        // Enregistre le QR code dans la base de données
        $eventUser->update(['qr_code' => $qrCode]);

        // Retourne la vue avec le QR code
        return view('show-qrcode', ['qrCode' => $qrCode]);
    }



}
