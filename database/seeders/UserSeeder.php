<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'first_name' => 'Super Admin',
            'last_name' => 'Account',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('password@123'),
            'role' => 'super_admin',
            'status' => 1,
        ]);

        $user2 = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Account',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password@123'),
            'role' => 'admin',
            'status' => 1,
        ]);

        $user3 = User::create([
            'first_name' => 'User',
            'last_name' => 'Account',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password@123'),
            'role' => 'user',
            'status' => 1,
        ]);
    }
}
