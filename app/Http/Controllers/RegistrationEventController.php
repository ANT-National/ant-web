<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationEventRequest;
use App\Mail\RegistrationSuccessfulMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\DiscordAlerts\Facades\DiscordAlert;
use Spatie\Permission\Models\Role;

class RegistrationEventController
{
    public function showRegistrationForm()
    {
        return view('registration-form', [
            'situations' => \App\Enums\Situation::toArray(),
            'genders' => \App\Enums\Gender::toArray(),
        ]);
    }

    public function handleEventRegister(RegistrationEventRequest $request)
    {
        $validated = $request->validated();

        $password = $this->generatePassword();
        $user = new User();
        $user->name = $validated['fullName'];
        $user->email = $validated['email'];
        $user->phone_number = $validated['phoneNumber'];
        $user->gender = $validated['gender'];
        $user->address = $validated['address'];
        $user->situation = $validated['situation'];
        $user->is_ant_member = $validated['isMember'] === 'yes';
        $user->password = Hash::make($password);
        DiscordAlert::message("You have a new registration from {$user->name} with password $password");
        Mail::to($user['email'])->send(new RegistrationSuccessfulMail($user->name));
        $user->save();
        $adminRole = Role::where('name', 'candidate')->firstOrFail();
        $user->assignRole($adminRole);
        return response()->json([
            'message' => 'Registration successful!',
            'redirect' => route('home')
        ]);
    }

    private function generatePassword()
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
    }
}
