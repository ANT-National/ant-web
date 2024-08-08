<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventUser;
use Illuminate\Support\Facades\Crypt;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = EventUser::with('student')->get();

        return view('admin.dashboard', compact('users'));
    }

    public function scan(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'qr_code' => 'required|string',
    ]);

    $encryptedData = $request->input('qr_code');

    try {
        // Decrypt the QR code content
        $decryptedData = Crypt::decryptString($encryptedData);

        // Split the secret and token
        list($secret, $token) = explode(':', $decryptedData);

        // Ensure the secret matches your unique key
        $expectedSecret = 'your-unique-secret-key';

        if ($secret !== $expectedSecret) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid QR code.',
            ]);
        }

        // Hash the token for comparison
        $hashedToken = hash('sha256', $token);

        // Search for the corresponding record in the event_user table
        $eventUser = EventUser::where('token', $hashedToken)->first();

        if ($eventUser) {
            // Retrieve the user's name
            $userName = $eventUser->student->name;
            $userId = $eventUser->student->id;
            $eventUser->validated = true;
            $eventUser->save();


            // If the token is valid, return success with the user's name
            return response()->json([
                'success' => true,
                'message' => 'QR Code validé pour l\'utilisateur : ' . $userName,
                'user_id' => $userId,
            ]);
        } else {
            // If the token is invalid
            return response()->json([
                'success' => false,
                'message' => 'QR Code invalide ou déjà utilisé.',
            ]);
        }
    } catch (\Exception $e) {
        // Handle decryption errors or other issues
        return response()->json([
            'success' => false,
            'message' => 'Erreur lors du traitement du QR code.',
        ]);
    }
}







}

