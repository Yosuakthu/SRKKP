<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(ShieldSeeder::class);

        // Assign super_admin role to user with ID 1
        $user = \App\Models\User::find(1);
        if ($user) {
            $user->assignRole('super_admin');
        }
    }
}
