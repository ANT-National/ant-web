<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationEventRequest;
use App\Mail\RegistrationSuccessfulMail;
use App\Models\EventRegistration;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\DiscordAlerts\Facades\DiscordAlert;
use Spatie\Permission\Models\Role;

class RegistrationEventController
{
    public function showRegistrationForm()
    {
        return view('registration.registration-form', [
            'situations' => \App\Enums\Situation::toArray(),
            'genders' => \App\Enums\Gender::toArray(),
        ]);
    }

    public function showAdminRegistrationList()
    {

        $registrations = EventRegistration::with('user')->get();
        return view('registration.index', [
            'registrations' => $registrations,
        ]);
    }

    public function handleEventRegister(RegistrationEventRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();

        try {
            $password = $this->generatePassword();
            $user = new User();
            $user->full_name = $validated['fullName'];
            $user->email = $validated['email'];
            $user->phone_number = $validated['phoneNumber'];
            $user->gender = $validated['gender'];
            $user->is_ant_member = $validated['isMember'];
            $user->password = Hash::make($password);
            DiscordAlert::message("You have a new registration from {$user->name} with password $password");
            Mail::to($user['email'])->send(new RegistrationSuccessfulMail($user->name));
            $user->save();
            $adminRole = Role::where('name', 'candidate')->firstOrFail();
            $user->assignRole($adminRole);
            EventRegistration::create([
                'user_id' => $user->id,
                'governorate' => $request->input('selectedGovernorate'),
                'delegation' => $request->input('selectedDelegation'),
                'city' => $request->input('selectedCity'),
                'situation' => $request->input('situation'),
                'school' => $request->input('school'),
                'study_field' => $request->input('studyField'),
                'study_year' => $request->input('studyYear'),
                'current_position' => $request->input('currentPosition'),
                'interests' => $request->input('interests'),
                'room_type' => $request->input('roomType'),
                'motivation' => $request->input('motivation'),
                'conference_idea' => $request->input('conferenceIdea'),
                'need_transport' => $request->input('needTransport'),
                'heard_from' => $request->input('heardFrom'),
            ]);

            DB::commit();
            return response()->json([
                'message' => 'Congratulations on your successful registration! 🎉 One of our tech-savvy team members will reach out shortly to validate your registration and ensure everything is seamlessly integrated. Stay tuned for a smooth and streamlined onboarding experience!',
                'redirect' => route('home')
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'An error occurred. Please try again later.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    private function generatePassword()
    {
        return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
    }
}
