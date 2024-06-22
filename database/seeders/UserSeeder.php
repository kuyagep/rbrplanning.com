<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $user1 = User::create([
        //     'first_name' => 'Super Admin',
        //     'last_name' => 'Account',
        //     'email' => 'super_admin@gmail.com',
        //     'password' => Hash::make('password@123'),
        //     'role' => 'super_admin',
        //     'status' => 1,
        // ]);

        // $user2 = User::create([
        //     'first_name' => 'Admin',
        //     'last_name' => 'Account',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password@123'),
        //     'role' => 'admin',
        //     'status' => 1,
        // ]);

        // $user3 = User::create([
        //     'first_name' => 'User',
        //     'last_name' => 'Account',
        //     'email' => 'user@gmail.com',
        //     'password' => Hash::make('password@123'),
        //     'role' => 'user',
        //     'status' => 1,
        // ]);

        // Sample user data
        $users = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'ext_name' => null,
                'middle_initial' => null,
                'date_of_birth' => '1990-01-15',
                'email' => 'super_admin@gmail.com',
                'role' => 'super_admin',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password@123'), // Hash the password
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'first_name' => 'Admin',
                'last_name' => 'Test',
                'ext_name' => null,
                'middle_initial' => null,
                'date_of_birth' => '1985-05-20',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password@123'), // Hash the password
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'first_name' => 'User',
                'last_name' => 'Test',
                'ext_name' => null,
                'middle_initial' => null,
                'date_of_birth' => '1992-05-23',
                'email' => 'user@gmail.com',
                'role' => 'user',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('password@123'), // Hash the password
                'remember_token' => null,
                'current_team_id' => null,
                'profile_photo_path' => null,
                'status' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more users as needed
        ];

        // Insert data into the database
        DB::table('users')->insert($users);
    }
}
