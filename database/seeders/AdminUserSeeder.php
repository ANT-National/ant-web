<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->firstOrFail();
        $admin = User::updateOrCreate(
            ['email' => 'admin@ant.com'],
            [
                'full_name' => 'Admin User',
                'phone_number' => '12345678',
                'gender' => Gender::Male,
                'password' => bcrypt('rdlt2750'),
            ]
        );

        $admin->assignRole($adminRole);

        $this->command->info('Admin user created and assigned the admin role successfully!');


    }
}
