<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve or create the student role
        $studentRole = Role::where('name', 'student')->firstOrFail();

        // Create or update a user with the student role
        $student = User::updateOrCreate(
            ['email' => 'student@school.com'], // Unique field to check for existing user
            [
                'name' => 'Student User',
                'phone_number' => '87654321',
                'gender' => Gender::Female, // Assuming Gender Enum includes Female
                'password' => bcrypt('password123'), // Ensure this is a strong password
            ]
        );

        // Assign the student role to the user
        $student->assignRole($studentRole);

        // Output a message to the console
        $this->command->info('Student user created and assigned the student role successfully!');
    }
}
