<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin already exists
        if (!User::where('email', 'admin@simhainteractive.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@simhainteractive.com',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
