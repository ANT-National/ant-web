<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::updateOrCreate(['name' => 'admin'], [
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        Role::updateOrCreate(['name' => 'candidate'], [
            'name' => 'candidate',
            'guard_name' => 'web',
        ]);

        $this->command->info('Roles created successfully!');
    }
}
